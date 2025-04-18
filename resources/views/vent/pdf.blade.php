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
            font-size: 9px;
            line-height: 1.2;
        }
        .invoice-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 15px;
            border: 1px solid #ddd;
        }
        .invoice-header {
            position: relative;
            margin-bottom: 12px;
            padding-bottom: 12px;
            border-bottom: 1px solid #eee;
            min-height: 80px;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        }
        .logo-container {
            height: 60px;
            width: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .logo {
            max-height: 60px;
            max-width: 120px;
            object-fit: contain;
        }
        .header-content {
            display: flex;
            flex: 1;
            justify-content: space-between;
            padding-left: 10px;
        }
        .invoice-title-container {
            width: 45%;
        }
        .invoice-title {
            color: #333;
            margin: 0;
            font-size: 14px;
            font-weight: bold;
        }
        .invoice-number {
            color: #666;
            font-size: 10px;
            margin: 3px 0 0 0;
        }
        .company-info {
            text-align: right;
            font-size: 12px;
            width: 45%;
        }
        .company-info h4 {
            margin: 0 0 3px 0;
            font-size: 11px;
            color: #333;
        }
        .company-info p {
            margin: 0 0 2px 0;
        }
        .invoice-info {
            margin-bottom: 12px;
            padding: 10px;
            background: #f9f9f9;
            border-radius: 3px;
            font-size: 9px;
            border: 1px solid #eee;
        }
        .invoice-info-row {
            display: flex;
            justify-content: space-between;
        }
        .invoice-info-col {
            width: 48%;
        }
        .invoice-notes {
            margin-bottom: 12px;
            padding: 10px;
            background: #f5f5f5;
            border-radius: 3px;
            font-size: 9px;
            border: 1px solid #eee;
        }
        .invoice-items {
            margin-bottom: 12px;
        }
        .invoice-items h6 {
            background-color: #f8f9fa;
            padding: 5px 8px;
            border-radius: 3px;
            margin: 8px 0 4px 0;
            border: 1px solid #eee;
            font-size: 10px;
        }
        .invoice-items table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 8px;
            font-size: 8px;
        }
        .invoice-items th, .invoice-items td {
            border: 1px solid #ddd;
            padding: 4px 6px;
            text-align: left;
        }
        .invoice-items th {
            background: #f8f9fa;
            font-weight: bold;
        }
        .invoice-total {
            margin-bottom: 12px;
            display: flex;
            justify-content: flex-end;
        }
        .invoice-total table {
            width: 200px;
            border-collapse: collapse;
            font-size: 10px;
            border: 1px solid #ddd;
        }
        .invoice-total th, .invoice-total td {
            border: 1px solid #ddd;
            padding: 6px;
            background-color: #f8f9fa;
        }
        .invoice-total th {
            font-weight: bold;
        }
        .invoice-footer {
            margin-top: 12px;
            padding-top: 12px;
            border-top: 1px solid #eee;
            font-size: 9px;
        }
        .invoice-footer-row {
            display: flex;
            justify-content: space-between;
        }
        .invoice-footer-col {
            width: 48%;
        }
        .signature-line {
            width: 120px;
            border-top: 1px solid #000;
            margin-top: 20px;
        }
        .text-end {
            text-align: right;
        }
        h5 {
            margin: 0 0 5px 0;
            font-size: 10px;
            color: #333;
            font-weight: bold;
        }
        h6 {
            margin: 8px 0 4px 0;
            font-size: 10px;
            color: #333;
            font-weight: bold;
        }
        p {
            margin: 0 0 2px 0;
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <div class="invoice-header">
            <div class="logo-container">
                @if($opticienInfo && $opticienInfo->logo)
                    <img src="{{ public_path('storage/' . $opticienInfo->logo) }}" alt="Logo" class="logo">
                @else
                    <img src="{{ public_path('assets/img/logo.jpg') }}" alt="Logo" class="logo">
                @endif
            </div>
            <div class="header-content">
                <div class="invoice-title-container">
                    <h2 class="invoice-title">Facture de Vente</h2>
                    <p class="invoice-number">N°: VENT-{{ str_pad($vent->id, 6, '0', STR_PAD_LEFT) }}</p>
                </div>
                <div class="company-info" style="position: absolute; right: 0; top: 0; margin-top:10px;">
                    <h4>{{ $opticienInfo->nom_entreprise ?? 'DigiOptics' }}</h4>
                    <p>{{ $opticienInfo->adresse ?? '' }}</p>
                    <p>{{ $opticienInfo->code_postal ?? '' }} {{ $opticienInfo->ville ?? '' }}</p>
                    <p>Tél: {{ $opticienInfo->telephone ?? '' }}</p>
                    <p>Email: {{ $opticienInfo->email ?? '' }}</p>
                </div>
            </div>
        </div>

        <div class="invoice-info" style="margin-bottom: 12px; padding: 0; background: transparent; border: none;">
            <!-- Remove the row container and place divs directly in the parent -->
            
            <!-- Supplier Info (Blue) - Positioned on the left with float -->
            <div style="padding: 10px; border-radius: 5px; width: 45%; float: left; box-sizing: border-box; border: 1px solid #ddd; margin-top: 0px;">
                <h5 style="margin: 0 0 5px 0; font-size: 10px; color: white; font-weight: bold;">Informations du Fournisseur</h5>
                <p style="margin: 0 0 2px 0;"><strong>Nom:</strong> {{ $vent->fournisseur->nom }}</p>
                <p style="margin: 0 0 2px 0;"><strong>Adresse:</strong> {{ $vent->fournisseur->adresse ?? 'Non spécifiée' }}</p>
                <p style="margin: 0 0 2px 0;"><strong>Téléphone:</strong> {{ $vent->fournisseur->telephone ?? 'Non spécifié' }}</p>
            </div>
            
            <!-- Invoice Details (Red) - Positioned on the right with float -->
            <div style="padding: 10px; border-radius: 5px; width: 45%; float: right; box-sizing: border-box; border: 1px solid #ddd;">
                <h5 style="margin: 0 0 5px 0; font-size: 10px; color: white; font-weight: bold;">Détails de la Facture</h5>
                <p style="margin: 0 0 2px 0;"><strong>Date:</strong> {{ $vent->date->format('d/m/Y') }}</p>
                <p style="margin: 0 0 2px 0;"><strong>Référence:</strong> VENT-{{ str_pad($vent->id, 6, '0', STR_PAD_LEFT) }}</p>
            </div>
            
            <!-- Clear the floats -->
            <div style="clear: both; height: 12px;"></div>
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
                        <th width="40%">Index</th>
                        <th width="15%">Quantité</th>
                        <th width="20%">Prix Unitaire</th>
                        <th width="25%" class="text-end">Total</th>
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
                        <th width="40%">Libellé</th>
                        <th width="15%">Quantité</th>
                        <th width="20%">Prix Unitaire</th>
                        <th width="25%" class="text-end">Total</th>
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
                        <th width="40%">Modèle</th>
                        <th width="15%">Quantité</th>
                        <th width="20%">Prix Unitaire</th>
                        <th width="25%" class="text-end">Total</th>
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
            <table style="margin-left: 69%;">
                <tr>
                    <th class="text-end">Total Général</th>
                    <td class="text-end">{{ number_format($vent->total, 2, ',', ' ') }} DA</td>
                </tr>
            </table>
        </div>

        <div class="invoice-footer">
            <div class="invoice-footer-row">
                <div class="invoice-footer-col" style="margin-top: 10px;">
                    <p>Merci de votre confiance</p>
                    <p>{{ $opticienInfo->nom_entreprise ?? 'DigiOptics' }}</p>
                </div>
                <div class="invoice-footer-col text-end" style="margin-left: 50%;">
                    <p>Signature</p>
                    <div class="signature-line" style="margin-left: auto;"></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 