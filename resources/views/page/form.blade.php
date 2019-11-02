@csrf
<input id="title" name="title" type="text" class="@error('title') is-invalid @enderror" value="{{isset($page->title) ? $page->title : null}}">
@error('title')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
<textarea id="content" name="content" type="text" class="@error('content') is-invalid @enderror">{{isset($page->content) ? $page->content : null}}</textarea>
@error('content')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
