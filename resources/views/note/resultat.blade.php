@extends('layout.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Résultats des étudiants</h1>

    <table class="table table-bordered table-hover table-striped text-center">
        <thead class="table-dark">
            <tr>
                <th>Étudiant</th>
                <th>UE</th>
                <th>Moyenne</th>
                <th>Résultat UE</th>
                <th>Résultat Final</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($resultatsEtudiants as $resultatEtudiant)
                @php $firstRow = true; @endphp
                @foreach ($resultatEtudiant['resultats_ues'] as $ue)
                    <tr>
                        @if ($firstRow)
                            <td rowspan="{{ count($resultatEtudiant['resultats_ues']) }}" class="align-middle fw-bold">
                                {{ $resultatEtudiant['etudiant'] }}
                            </td>
                            @php $firstRow = false; @endphp
                        @endif
                        <td>{{ $ue['ue_nom'] }}</td>
                        <td>{{ $ue['moyenne'] }}</td>
                        <td>
                            <span class="badge bg-{{ $ue['resultat'] == 'Validé' ? 'success' : 'danger' }}">
                                {{ $ue['resultat'] }}
                            </span>
                        </td>
                        @if ($loop->first)
                            <td rowspan="{{ count($resultatEtudiant['resultats_ues']) }}" class="align-middle">
                                <span class="badge bg-{{ $resultatEtudiant['resultat_final'] == 'Validé' ? 'success' : 'danger' }}">
                                    {{ $resultatEtudiant['resultat_final'] }}
                                </span>
                            </td>
                        @endif
                    </tr>
                @endforeach
                @if (empty($resultatEtudiant['resultats_ues']))
                    <tr>
                        <td>{{ $resultatEtudiant['etudiant'] }}</td>
                        <td colspan="3">Aucun résultat</td>
                        <td>
                            <span class="badge bg-muted">{{ $resultatEtudiant['resultat_final'] }}</span>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>

<style>
    .table {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .table th, .table td {
        vertical-align: middle;
    }
    .badge {
        font-size: 0.9rem;
        padding: 0.5em 1em;
        border-radius: 12px;
    }
    h1 {
        font-family: 'Arial', sans-serif;
        font-weight: 700;
    }
</style>
@endsection
