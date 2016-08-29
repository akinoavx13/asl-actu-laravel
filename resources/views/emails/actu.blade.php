@extends('emails.layout')

@section('title')
    Nouvelle actualité
@stop

@section('content')
    <p>Bonjour, {{ $user['forname'] }} {{ $user['name'] }}</p>
    <br>

    <p>Une nouvelle actualité vient d'être écrite par {{ $writer->forname }} {{ $writer->name }} dans la catégorie <span style="font-weight: bold">{{ $categoryName }}</span>. Merci de ne pas répondre à ce mail mais
        directement sur <a href="http://actu.aslectra.com">ACTU ASLectra</a> !</p>

    <p>Actualité : </p>

    <p class="text-center">
        {!! $content !!}
    </p>

@stop