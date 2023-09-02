@extends("Teacher.layouts.main")

@section("content")
<div class="app-content content">
    <div class="container">
        <div class="alert alert-primary">الاسئلة الدراسية</div>
        <div class="card" style="padding: 20px;">
            <form action="{{ route("search_questins") }}" method="get">
                <div class="row">
                    <div class="col-6">
                        <select style="width: 100%;" name="school_grade" class="form-select form-select-sm" id="search_school_grade" aria-label=".form-select-sm example">
                            <option selected value="0">اختر الصف الدراسى</option>
                            @forelse ($school_grades as $school_grade)
                                <option value="{{ $school_grade->id }}">{{ $school_grade->name }}</option>
                            @empty

                            @endforelse
                        </select>
                    </div>

                    <div class="col-6">
                        <input class="form-control" name="name" list="datalistOptions" id="search" placeholder="أدحل اسم السؤال">
                    </div>

                    <div class="col-6" style="margin-top: 15px;">
                        <select style="width: 100%;" name="unit" class="form-select form-select-sm" id="unit" aria-label=".form-select-sm example">
                            <option selected value="0">اختر الوحدة الدراسية</option>
                            @forelse ($units as $unit)
                                <option value="{{ $unit->id }}">{{ $unit->title }}</option>
                            @empty

                            @endforelse
                        </select>
                    </div>

                    <div class="col-6" style="margin-top: 15px;">
                        <button type="submit" class="btn btn-primary">تطبيق</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <table class="table table-de mb-0">
                <thead>
                    <tr>
                        <th>عنوان السؤال</th>
                        <th>وصف السؤال</th>
                        <th>احتيارات السؤال</th>
                        <th>اسم الوحدة</th>
                        <th>المرحلة الدراسية</th>
                        <th>التعديلات</th>
                    </tr>
                </thead>
                <tbody id="search_part">
                    @forelse ($questions as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>
                            {{ $item->answer }}
                        </td>
                        <td>{{ $item->unit_name }}</td>
                        <td>{{ $item->school_grade }}</td>
                        <td>
                            <x-operation
                                :edit="route('question.edit',['id'=>$item->id])"
                                :view="route('question.show',['id'=>$item->id])"
                                :delete="route('question.destroy',['id'=>$item->id])"
                                :id="$item->id"
                                >
                            </x-operation>
                        </td>
                    </tr>
                    @empty
                    <div class="alert alert-danger">لا توجد أسئلة دراسية بعد</div>
                    @endforelse
                </tbody>
            </table>

            <div class="row">
                <a href="{{ route("question.add") }}" class="btn btn-primary"><i class="fa fa-plus"></i> اضافة سؤال جديد</a>
            </div>

        </div>
        {{ $questions->links() }}
    </div>
</div>
@endsection

@section("script")
<script>
    document.getElementById("search_school_grade").addEventListener("change",function (){
        let val=document.getElementById("search_school_grade").value
        let unit=document.getElementById("unit").value

        let url
        if(unit>0){
            url="/teacher/question/search?"+"school_grade="+val+"&unit="+unit
        }else{
            url="/teacher/question/search?school_grade="+val
        }
        document.getElementById("search_part").innerHTML='';
        $.ajax({
            url:  url,
            type: 'get',
            success: function(data) {
                table_code=document.getElementById("search_part");
                document.getElementById("search").value=''
                if(data["data"]["data"].length > 0){
                    for(let i=0;i<data["data"]["data"].length;i++){
                        table_code.innerHTML+=`
                            <tr>
                                <td>${data["data"]["data"][i].name}</td>
                                <td>${data["data"]["data"][i].description}</td>
                                <td>
                                    ${data["data"]["data"][i].answer}
                                </td>
                                <td>${data["data"]["data"][i].unit_name}</td>
                                <td>${data["data"]["data"][i].school_grade}</td>
                                <td>
                                <div class="row">
                                        <a href="teacher/question/edit/${data["data"]["data"][i].id}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">حذف العنصر</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        هل تريد حذف هذا العنصر ؟
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <a href="teacher/question/delete/${data["data"]["data"][i].id}" class="btn btn-danger">delete <i class="fa fa-trash"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <a href="teacher/question/show/${data["data"]["data"][i].id}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                    </div>
                                </td>
                            </tr>
                        `
                    }
                }else{
                    table_code.innerHTML+=`
                    <tr> <td colspan="5" class="text-center"> لا توجد نتأئج لعرضها </td> </tr>
                    `
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Handle any errors
                console.log('Error:', textStatus, errorThrown);
            }
        });
    })

    document.getElementById("unit").addEventListener("change",function (){
        let val=document.getElementById("unit").value
        let school_grade=document.getElementById("search_school_grade").value

        let url
        if(school_grade>0){
            url="/teacher/question/search?"+"school_grade="+school_grade+"&unit="+val
        }else{
            url="/teacher/question/search?unit="+val
        }
        document.getElementById("search_part").innerHTML='';
        $.ajax({
            url:  url,
            type: 'get',
            success: function(data) {
                table_code=document.getElementById("search_part");
                document.getElementById("search").value=''
                if(data["data"]["data"].length > 0){
                    for(let i=0;i<data["data"]["data"].length;i++){
                        table_code.innerHTML+=`
                            <tr>
                                <td>${data["data"]["data"][i].name}</td>
                                <td>${data["data"]["data"][i].description}</td>
                                <td>
                                    ${data["data"]["data"][i].answer}
                                </td>
                                <td>${data["data"]["data"][i].unit_name}</td>
                                <td>${data["data"]["data"][i].school_grade}</td>
                                <td>
                                <div class="row">
                                        <a href="teacher/question/edit/${data["data"]["data"][i].id}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">حذف العنصر</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        هل تريد حذف هذا العنصر ؟
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <a href="teacher/question/delete/${data["data"]["data"][i].id}" class="btn btn-danger">delete <i class="fa fa-trash"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <a href="teacher/question/show/${data["data"]["data"][i].id}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                    </div>
                                </td>
                            </tr>
                        `
                    }
                }else{
                    table_code.innerHTML+=`
                    <tr> <td colspan="5" class="text-center"> لا توجد نتأئج لعرضها </td> </tr>
                    `
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Handle any errors
                console.log('Error:', textStatus, errorThrown);
            }
        });
    })

    document.getElementById("search").addEventListener("input",function (){
        let val=document.getElementById("search").value

        let school_grade=document.getElementById("search_school_grade").value
        let unit=document.getElementById("unit").value

        let url
        if(school_grade>0 & unit == 0){
            url="/teacher/question/search/name?name="+val+"&school_grade="+school_grade
        }else if(school_grade==0 & unit > 0){
            url="/teacher/question/search/name?name="+val+"&unit="+unit
        }else if(school_grade>0 & unit > 0){
            url="/teacher/question/search/name?name="+val+"&school_grade="+school_grade+"&unit="+unit
        }else{
            url="/teacher/question/search/name?name="+val
        }

        document.getElementById("search_part").innerHTML='';

        $.ajax({
            url:  url,
            type: 'get',
            success: function(data) {
                table_code=document.getElementById("search_part");

                if(data["data"]["data"].length > 0){
                    for(let i=0;i<data["data"]["data"].length;i++){
                        table_code.innerHTML+=`
                            <tr>
                                <td>${data["data"]["data"][i].name}</td>
                                <td>${data["data"]["data"][i].description}</td>
                                <td>
                                    ${data["data"]["data"][i].answer}
                                </td>
                                <td>${data["data"]["data"][i].school_grade}</td>
                                <td>${data["data"]["data"][i].unit_name}</td>
                                <td>
                                    <div class="row">
                                        <a href="teacher/question/edit/${data["data"]["data"][i].id}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">حذف العنصر</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        هل تريد حذف هذا العنصر ؟
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <a href="teacher/question/delete/${data["data"]["data"][i].id}" class="btn btn-danger">delete <i class="fa fa-trash"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <a href="teacher/question/show/${data["data"]["data"][i].id}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                    </div>
                                </td>
                            </tr>
                        `
                    }
                }else{
                    table_code.innerHTML=`
                    <tr> <td colspan="5" class="text-center"> لا توجد نتأئج لعرضها </td> </tr>
                    `
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Handle any errors
                console.log('Error:', textStatus, errorThrown);
            }
        });
    })
</script>
@endsection
