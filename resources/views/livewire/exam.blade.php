<div>
    <form wire:submit="send_exam">
        <?php $i=0 ?>
        @foreach ($data["questions"] as $question)
        <div class="form-group">
            <div class="card" style="padding:15px;">السؤال رقم  {{ $question->name }} -: {{ ++$i }} </div>
            @foreach (explode(",",$question->chooses) as $choose)
            <div class="form-check">
                <input class="form-check-input" type="radio" name="{{ $question->name }}" id="{{ $choose }}">
                <label class="form-check-label" for="{{ $choose }}">
                  {{ $choose }}
                </label>
            </div>
            @endforeach
        </div>
        @endforeach
        <button type="submit" class="btn btn-success">ارسال</button>
    </form>
</div>
