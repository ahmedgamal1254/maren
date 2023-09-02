$(function() {
    $.ajaxSetup({
        headers: {
        'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        }
    });

    var element = document.getElementById("search_student");
    element.addEventListener('input', function (){
        var search=document.getElementById("search_student").value

        $.ajax({
                url:  "/teacher/students/search?search="+search,
                type: 'get',
                success: function(data) {
                    console.log(data["data"][0]);
                    console.log(data["data"].length)

                    document.getElementById("search_part").innerHTML='';
                    table_code=document.getElementById("search_part");
                    for(let i=0;i<data["data"].length;i++){
                        table_code.innerHTML+=`
                        <tr>
                            <td>${data["data"][i]["name"]}</td>
                            <td>${data["data"][i]["phonenumber"]}</td>
                            <td>${data["data"][i]["school_grade"]}</td>
                            <td>${data["data"][i]["subject_name"]}</td>
                            <td>${get_differ_date(data["data"][i]["created_at"])}</td>
                            <td>${data["data"][i]["all_points"]}</td>
                            <td>${data["data"][i]["active_points"]}</td>
                            <td>
                                <div class="row">
                                    <a href="teacher/student/edit/${data["data"][i]["id"]}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_${data["data"][i]["id"]}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    <div class="modal fade" id="delete_${data["data"][i]["id"]}" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
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
                                                    <a href="teacher/student/delete/${data["data"][i]["id"]}" class="btn btn-danger">delete <i class="fa fa-trash"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="teacher/student/${data["data"][i]["id"]}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                    <button type="button" class="btn btn-black" data-toggle="modal" data-target="#user_${data["data"][i]["id"]}">
                                        <i class="fa fa-user-graduate"></i>
                                    </button>
                                    <div class="modal fade" id="user_${data["data"][i]["id"]}" tabindex="-1" role="dialog" aria-labelledby="user_${data["data"][i]["id"]}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">تعديل نقاط الطالب </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="" class="points">
                                                        <input type="hidden" name="user_id" value="${data["data"][i]["id"]}">
                                                        <div class="mb-3">
                                                            <label for="number" class="form-label">تعديل نقاط الطالب ${data["data"][i]["name"]}</label>
                                                            <input type="number" name="point" class="form-control" id="number" placeholder="تعديل نقاط الطالب">
                                                        </div>
                                                        <button type="submit" class="btn btn-success">خفظ</button>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    `
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Handle any errors
                    console.log('Error:', textStatus, errorThrown);
                }
        });
    });


    $(document).on('submit', '.points', function(e) {
        e.preventDefault();

        $.ajax({
            url:"/teacher/student/point",
            type: 'post',
            data:$(this).serialize(),
            success: function(data) {
                swal(data["data"]["data"])
                $(this).reset()
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Handle any errors
                console.log('Error:', textStatus, errorThrown);
            }
        });
    });
});
function get_differ_date(selected_date){
    let now=new Date() // date now
    let created_at=new Date(selected_date) // selected date to differ from now
    const diffTime = (now - created_at); // difference between date in miliseconds

    /**
    difference between date in days
    difference between date in month
    difference between date in year
    difference between date in minutes
    difference between date in seconds
    difference between date in hours
    */
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
    const diffHour = Math.floor(diffTime / (1000 * 60 * 60));
    const diffMinute = Math.floor(diffTime / (1000 * 60));
    const diffsecond = Math.floor(diffTime / (1000));
    const diffyear = Math.floor(diffTime / (1000 * 60 * 60 * 24 * 365));
    const diffmonth = Math.floor(diffTime / (1000 * 60 * 60 * 24 * 30));

    if(diffsecond < 60){
        return "تم الاضافة قبل " + diffsecond + "ثوانى"
    }else if(diffMinute < 60){
        if(diffMinute <= 1){
            return "تم الاضافة قبل " + "دقيقة"
        }else if(diffMinute <= 2){
            return "تم الاضافة قبل " + "دقيقتين"
        }else{
            return "تم الاضافة قبل " + diffMinute + "دقائق"
        }
    }
    else if(diffHour < 24){
        if(diffHour <= 1){
            return "تم الاضافة قبل " + "ساعة"
        }else if(diffHour <= 2){
            return "تم الاضافة قبل " + "ساعاتين"
        }else{
            return " تم الاضافة قبل " + diffHour + "ساعات"
        }
    }else if(diffDays < 30){
        if(diffDays <= 1){
            return "تم الاضافة قبل " + "يوم"
        }else if(diffDays <= 2){
            return "تم الاضافة قبل " + "يومين"
        }else{
            return "تم الاضافة قبل " + diffDays + "أيام "
        }
    }
    else if(diffmonth < 30){
        if(diffmonth <= 1){
            return "تم الاضافة قبل " + "شهر"
        }else if(diffmonth <= 2){
            return "تم الاضافة قبل " + "شهرين"
        }else{
            return "تم الاضافة قبل " + diffmonth + " أشهر "
        }
    }else{
        if(diffyear <= 1){
            return "تم الاضافة قبل " + "سنة"
        }else if(diffyear <= 2){
            return "تم الاضافة قبل " + "سنتين"
        }else{
            return "تم الاضافة قبل " + diffyear + "سنوات "
        }
    }
}
