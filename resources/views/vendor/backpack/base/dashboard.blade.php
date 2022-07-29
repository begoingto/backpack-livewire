@extends(backpack_view('blank'))

@php
$widgets['before_content'][] = [
    'type'        => 'jumbotron',
    'heading'     => backpack_user()->name.' welcome!',
    'content'     => 'Use the sidebar to the left to create, edit or delete content.',
    'button_link' => backpack_url('edit-account-info'),
    'button_text' => 'Profile',
];
@endphp

@section('content')
    <h1>Hello backpack 2022</h1>
@endsection
