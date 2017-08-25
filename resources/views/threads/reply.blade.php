<div class="panel panel-default">

    <div class="panel-heading">
        {{$thread->creator->name}} said
        {{$reply->created_at}}
    </div>

    <div class="panel-body">
        {{$reply ->body}}
    </div>

</div>