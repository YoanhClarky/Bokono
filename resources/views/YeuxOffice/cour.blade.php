@extends('YeuxLayout.index')

@section('content')
    <h1>COURS</h1><br>
    <table class="table table-striped table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>COLLECTION</th>
            </tr>
        </thead>
        <tbody>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td>
                        <div class="d-flex justify-content-between align-items-center">
                        <div>
                                <i class="fas fa-book"></i> {{ " - ".$item->cycle->code." - ".$item->cour->designation." (".$item->type->designation.")" }}
                            @foreach($courfilieres->where('courcycle_id',$item->id) as $fil)
                                {{ $fil->filiere->code.", "  }}
                            @endforeach
                        </div>

                        
                            <div>
                                @if($item->etat)
                                <a class="btn btn-success btn-sm" href="/yeux/cour/desactiver/{{ $item->id }}">
                                    <i class="fas fa-check"></i> Est actif
                                </a>
                                @else
                                <a class="btn btn-warning btn-sm" href="/yeux/cour/activer/{{ $item->id }}">
                                    <i class="fas fa-times"></i> Est inactif
                                </a>
                                @endif
                                
                                @if($item->yeux)
                                <a class="btn btn-success btn-sm" href="/yeux/cour/deyeux/{{ $item->id }}">
                                    <i class="fas fa-eye"></i> Visible
                                </a>
                                @else
                                <a class="btn btn-warning btn-sm" href="/yeux/cour/yeux/{{ $item->id }}">
                                    <i class="fas fa-eye"></i> Invisible
                                </a>
                                @endif
    
                                <a class="btn btn-danger btn-sm" href="/yeux/cour/supprimer/{{ $item->id }}">
                                    <i class="fas fa-trash"></i> Supprimer def
                                </a>
                            
                        </div>
                    </div>
                    </td>
                </tr>
                
                @endforeach
                <!-- Ajoutez d'autres lignes pour plus de livres -->
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-4 mb-4">
        {{$items->links()}}
    </div>
@endsection