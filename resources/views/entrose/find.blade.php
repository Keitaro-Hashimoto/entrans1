@extends('layouts.entroseapp')

@section('title', 'entrose.find')

@section('menubar')
   @parent
   検索ページ
@endsection

@section('content')

   @if (isset($item))
   <table>
   <tr><th>Data</th></tr>
   <tr>
      <td>{{$item->getData()}}</td>
     
   </tr>
   </table>
   @endif
@endsection