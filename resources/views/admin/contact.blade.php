@extends('layouts.admin')

@section('content')

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Cанал хүсэлтүүд</h4>
                            </div>
                             @if($contacts->isEmpty())
                             <div class="header">
                                <div class="typo-line">
                                    <p class="category">Cанал хүсэлт байхгүй байна.</p>
                                </div>
                              </div>
                            @else
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-striped">
                                        <thead>
                                            <th>ID</th>
                                            <th>И-мэйл</th>
                                            <th>Утас</th>
                                            <th>Мессеж</th>
                                            <th>Салбар</th>
                                        </thead>
                                        <tbody>
                                                @foreach ($contacts as $contact)
                                                <tr>
                                                    <td>{{ $contact->id }}</td>
                                                    <td>{{ $contact->c_email }}</td>
                                                    <td>{{ $contact->c_phone }}</td>
                                                    <td>{{ $contact->c_message }}</td>
                                                    <td>{{ $contact->sector->name }}</td>
                                                </tr>
                                                @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection