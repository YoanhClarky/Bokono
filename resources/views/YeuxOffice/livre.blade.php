@extends('YeuxLayout.index')

@section('content')
    <h1>LIVRES</h1><br>
    <table class="table table-striped table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>COLLECTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach($livres as $item)
            <tr>
                <td>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                                <i class="fas fa-book"></i> {{ " - ".$item->titre.", ".$item->soustitre.", ed: ".$item->edition}}
                        </div>
                        <div>
                            @if($item->etat)
                            <a class="btn btn-success btn-sm" href="/yeux/livre/desactiver/{{ $item->id }}">
                                <i class="fas fa-check"></i> Est actif
                            </a>
                            @else
                            <a class="btn btn-warning btn-sm" href="/yeux/livre/activer/{{ $item->id }}">
                                <i class="fas fa-times"></i> Est inactif
                            </a>
                            @endif
                            
                            @if($item->yeux)
                            <a class="btn btn-success btn-sm" href="/yeux/livre/deyeux/{{ $item->id }}">
                                <i class="fas fa-eye"></i> Visible
                            </a>
                            @else
                            <a class="btn btn-warning btn-sm" href="/yeux/livre/yeux/{{ $item->id }}">
                                <i class="fas fa-eye"></i> Invisible
                            </a>
                            @endif

                            <a class="btn btn-danger btn-sm" href="/yeux/livre/supprimer/{{ $item->id }}">
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
        {{$livres->links()}}
    </div>
@endsection