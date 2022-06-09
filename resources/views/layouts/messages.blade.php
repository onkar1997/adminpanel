<style>
    .close {
        cursor: pointer;
        position: absolute;
        top: 50%;
        right: 0%;
        padding: 12px 16px;
        margin-right: 5px;
        border-radius: 10px;
        transform: translate(0%, -50%);
    }

    .succlose:hover {
        background: #4ac77d;
        color: #fff;
    }

    .errclose:hover {
        background: #ed4259;
        color: #fff;
    }
</style>

@if(count($errors) > 0)
@foreach($errors->all() as $error)
<div class="alert alert-danger">
    {{$error}} <span class="close errclose">x</span>
</div>
@endforeach
@endif

@if(session('success'))
<div class="alert alert-success">
    {{session('success')}} <span class="close succlose">x</span>
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
    {{session('error')}} <span class="close errclose">x</span>
</div>
@endif

<script>
    var closebtns = document.getElementsByClassName("close");
    var i;

    /* Loop through the elements, and hide the parent, when clicked on */
    for (i = 0; i < closebtns.length; i++) {
    closebtns[i].addEventListener("click", function() {
        this.parentElement.style.display = 'none';
    });
    }
</script>