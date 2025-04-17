<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Facture de Vente - VENT-{{ str_pad($vent->id, 6, '0', STR_PAD_LEFT) }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 10px;
            color: #333;
            font-size: 10px;
        }
        .invoice-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 10px;
            border: 1px solid #eee;
        }
        .invoice-header {
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }
        .invoice-title {
            color: #333;
            margin-top: 10px;
            font-size: 14px;
        }
        .invoice-number {
            color: #666;
            font-size: 12px;
        }
        .invoice-info {
            margin-bottom: 15px;
            padding: 10px;
            background: #f9f9f9;
            border-radius: 3px;
            font-size: 9px;
        }
        .invoice-notes {
            margin-bottom: 15px;
            padding: 8px;
            background: #f5f5f5;
            border-radius: 3px;
            font-size: 9px;
        }
        .invoice-items {
            margin-bottom: 15px;
        }
        .invoice-items table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
            font-size: 9px;
        }
        .invoice-items th, .invoice-items td {
            border: 1px solid #ddd;
            padding: 4px;
            text-align: left;
        }
        .invoice-items th {
            background: #f8f9fa;
        }
        .invoice-total {
            margin-bottom: 15px;
        }
        .invoice-total table {
            width: 200px;
            margin-left: auto;
            border-collapse: collapse;
            font-size: 9px;
        }
        .invoice-total th, .invoice-total td {
            border: 1px solid #ddd;
            padding: 4px;
        }
        .invoice-footer {
            margin-top: 20px;
            padding-top: 10px;
            border-top: 1px solid #eee;
            font-size: 9px;
        }
        .signature-line {
            width: 150px;
            border-top: 1px solid #000;
            margin-top: 20px;
        }
        .text-end {
            text-align: right;
        }
        .company-info {
            text-align: right;
            font-size: 9px;
        }
        .logo {
            max-height: 50px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <div class="invoice-header">
            <div>
                <img src="{{ public_path('assets/img/logo.jpg') }}" alt="Logo" class="logo">
                <h2 class="invoice-title">Facture de Vente</h2>
                <p class="invoice-number">N°: VENT-{{ str_pad($vent->id, 6, '0', STR_PAD_LEFT) }}</p>
            </div>
            <div class="company-info">
                <h4>{{ $opticienInfo->nom_entreprise ?? 'DigiOptics' }}</h4>
                <p>{{ $opticienInfo->adresse ?? '' }}<br>
                   Tél: {{ $opticienInfo->telephone ?? '' }}<br>
                   Email: {{ $opticienInfo->email ?? '' }}</p>
            </div>
        </div>

        <div class="invoice-info">
            <div style="display: flex; justify-content: space-between;">
                <div>
                    <h5>Informations du Fournisseur</h5>
                    <p><strong>Nom:</strong> {{ $vent->fournisseur->nom }}<br>
                       <strong>Adresse:</strong> {{ $vent->fournisseur->adresse ?? 'Non spécifiée' }}<br>
                       <strong>Téléphone:</strong> {{ $vent->fournisseur->telephone ?? 'Non spécifié' }}</p>
                </div>
                <div>
                    <h5>Détails de la Facture</h5>
                    <p><strong>Date:</strong> {{ $vent->date->format('d/m/Y') }}<br>
                       <strong>Référence:</strong> VENT-{{ str_pad($vent->id, 6, '0', STR_PAD_LEFT) }}</p>
                </div>
            </div>
        </div>

        @if($vent->notes)
        <div class="invoice-notes">
            <h5>Notes</h5>
            <p>{{ $vent->notes }}</p>
        </div>
        @endif

        <div class="invoice-items">
            @if($vent->verres->isNotEmpty())
            <h6>Verres</h6>
            <table>
                <thead>
                    <tr>
                        <th>Index</th>
                        <th>Quantité</th>
                        <th>Prix Unitaire</th>
                        <th class="text-end">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vent->verres as $verre)
                    <tr>
                        <td>{{ $verre->index_verre }}</td>
                        <td>{{ $verre->pivot->quantite }}</td>
                        <td class="text-end">{{ number_format($verre->pivot->prix_unitaire, 2, ',', ' ') }} DA</td>
                        <td class="text-end">{{ number_format($verre->pivot->total, 2, ',', ' ') }} DA</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif

            @if($vent->lentilles->isNotEmpty())
            <h6>Lentilles</h6>
            <table>
                <thead>
                    <tr>
                        <th>Libellé</th>
                        <th>Quantité</th>
                        <th>Prix Unitaire</th>
                        <th class="text-end">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vent->lentilles as $lentille)
                    <tr>
                        <td>{{ $lentille->libellé }}</td>
                        <td>{{ $lentille->pivot->quantite }}</td>
                        <td class="text-end">{{ number_format($lentille->pivot->prix_unitaire, 2, ',', ' ') }} DA</td>
                        <td class="text-end">{{ number_format($lentille->pivot->total, 2, ',', ' ') }} DA</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif

            @if($vent->montures->isNotEmpty())
            <h6>Montures</h6>
            <table>
                <thead>
                    <tr>
                        <th>Modèle</th>
                        <th>Quantité</th>
                        <th>Prix Unitaire</th>
                        <th class="text-end">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vent->montures as $monture)
                    <tr>
                        <td>{{ $monture->model_monture }}</td>
                        <td>{{ $monture->pivot->quantite }}</td>
                        <td class="text-end">{{ number_format($monture->pivot->prix_unitaire, 2, ',', ' ') }} DA</td>
                        <td class="text-end">{{ number_format($monture->pivot->total, 2, ',', ' ') }} DA</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>

        <div class="invoice-total">
            <table>
                <tr>
                    <th class="text-end">Total Général</th>
                    <td class="text-end">{{ number_format($vent->total, 2, ',', ' ') }} DA</td>
                </tr>
            </table>
        </div>

        <div class="invoice-footer">
            <div style="display: flex; justify-content: space-between;">
                <div>
                    <p>Merci de votre confiance</p>
                </div>
                <div>
                    <p>Signature</p>
                    <div class="signature-line"></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 