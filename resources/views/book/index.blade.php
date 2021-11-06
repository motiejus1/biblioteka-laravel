@extends('layouts.app')

@section('content')

<div class="container">

    <form method="GET" action="{{route('book.index')}}">
        @csrf
        <select name="bookTitle">
            @foreach ($filterBooks as $book)
                <option value="{{$book->title}}">{{$book->title}}</option>
            @endforeach
        </select>

        <button type="submit">Filter</button>

    </form>

    <form method="GET" action="{{route('book.index')}}">
        @csrf
        <select name="bookAuthor">
            @foreach ($authors as $author)
                <option value="{{$author->id}}">{{$author->name}} {{$author->surname}}</option>
            @endforeach
        </select>

        <button type="submit">Filter</button>

    </form>

    <a href="{{route('book.index')}}" class="btn btn-primary">Clear Filter</a>

    <a href="{{route('book.create')}}" class="btn btn-primary">Create Book</a>


    <a href="{{route('book.generatestatistics')}}" class="btn btn-secondary">
        Export statistics
    </a>
    <table class="table table-striped">

        <tr>
            <td> @sortablelink('id', 'ID')</td>
            <td> @sortablelink('title', 'Title') </td>
            <td> @sortablelink('isbn', 'ISBN') </td>
            <td> @sortablelink('pages', 'Pages') </td>
            <td> @sortablelink('about', 'About') </td>
            <td> @sortablelink('author_id', 'Author') </td>
            <td> Actions </td>
        </tr>

        @foreach ($books as $book)
            <tr>
                <td> {{$book->id}} </td>
                <td> {{$book->title}} </td>
                <td> {{$book->isbn}} </td>
                <td> {{$book->pages}} </td>
                <td> {!! $book->about !!} </td>
                <td> {{$book->bookAuthor->name}} {{$book->bookAuthor->surname}}</td>
                <td>
                    <a href="{{route('book.edit',[$book])}}" class="btn btn-secondary">Edit</a>
                    <a href="{{route('book.show',[$book])}}" class="btn btn-primary">Show</a>
                    <form method="post" action="{{route('book.destroy', [$book])}}">
                        @csrf
                        <button class="btn btn-danger" type="submit">DELETE</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $books->appends(Request::except('page'))->render() !!}

</div>
@endsection
