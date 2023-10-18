@extends('YeuxLayout.index')

@section('content')
    <h1>RESUMES</h1><br>
    <table class="table table-striped table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>COLLECTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach($resumes as $item)
            <tr>
                <td>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                                <i class="fas fa-book"></i> {{ " - ".$item->designation}}
                        </div>
                        <div>
                            @if($item->etat)
                            <a class="btn btn-success btn-sm" href="/yeux/resume/desactiver/{{ $item->id }}">
                                <i class="fas fa-check"></i> Est actif
                            </a>
                            @else
                            <a class="btn btn-warning btn-sm" href="/yeux/resume/activer/{{ $item->id }}">
                                <i class="fas fa-times"></i> Est inactif
                            </a>
                            @endif
                            
                            @if($item->yeux)
                            <a class="btn btn-success btn-sm" href="/yeux/resume/deyeux/{{ $item->id }}">
                                <i class="fas fa-eye"></i> Visible
                            </a>
                            @else
                            <a class="btn btn-warning btn-sm" href="/yeux/resume/yeux/{{ $item->id }}">
                                <i class="fas fa-eye"></i> Invisible
                            </a>
                            @endif

                            <a class="btn btn-danger btn-sm" href="/yeux/resume/supprimer/{{ $item->id }}">
                                <i class="fas fa-trash"></i> Supprimer def
                            </a>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-4 mb-4">
        {{$resumes->links()}}
    </div>
@endsection