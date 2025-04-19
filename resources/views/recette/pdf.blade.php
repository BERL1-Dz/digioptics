<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Recette - REC-{{ str_pad($recette->id, 6, '0', STR_PAD_LEFT) }}</title>
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
        .client-info {
            margin-bottom: 12px;
            padding: 10px;
            background: #f9f9f9;
            border-radius: 3px;
            font-size: 9px;
            border: 1px solid #eee;
        }
        .prescription-info {
            margin-bottom: 12px;
            padding: 10px;
            background: #f5f5f5;
            border-radius: 3px;
            font-size: 9px;
            border: 1px solid #eee;
        }
        .prescription-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }
        .prescription-section {
            padding: 10px;
            background: #fff;
            border-radius: 3px;
            border: 1px solid #eee;
        }
        .prescription-section h5 {
            margin: 0 0 5px 0;
            font-size: 10px;
            color: #333;
            font-weight: bold;
        }
        .prescription-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 2px;
        }
        .product-info {
            margin-bottom: 12px;
            padding: 10px;
            background: #f9f9f9;
            border-radius: 3px;
            font-size: 9px;
            border: 1px solid #eee;
        }
        .financial-info {
            margin-bottom: 12px;
            padding: 10px;
            background: #f5f5f5;
            border-radius: 3px;
            font-size: 9px;
            border: 1px solid #eee;
        }
        .financial-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 2px;
        }
        .invoice-footer {
            margin-top: 12px;
            padding-top: 12px;
            border-top: 1px solid #eee;
            font-size: 9px;
        }
        .signature-line {
            width: 120px;
            border-top: 1px solid #000;
            margin-top: 20px;
        }
        .text-end {
            text-align: right;
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
                    <h2 class="invoice-title">Recette</h2>
                    <p class="invoice-number">N°: REC-{{ str_pad($recette->id, 6, '0', STR_PAD_LEFT) }}</p>
                </div>
                <div class="company-info">
                    <h4>{{ $opticienInfo->nom_entreprise ?? 'DigiOptics' }}</h4>
                    <p>{{ $opticienInfo->adresse ?? '' }}</p>
                    <p>{{ $opticienInfo->code_postal ?? '' }} {{ $opticienInfo->ville ?? '' }}</p>
                    <p>Tél: {{ $opticienInfo->telephone ?? '' }}</p>
                    <p>Email: {{ $opticienInfo->email ?? '' }}</p>
                </div>
            </div>
        </div>

        <div class="client-info">
            <h5>Informations du Client</h5>
            <p><strong>Nom:</strong> {{ $recette->client_nom }} {{ $recette->client_prenom }}</p>
            <p><strong>Téléphone:</strong> {{ $recette->client_telephone }}</p>
        </div>

        <div class="prescription-info">
            <h5>Prescription</h5>
            <div class="prescription-grid">
                <div class="prescription-section">
                    <h5>Œil Droit</h5>
                    <div class="prescription-row">
                        <span>Sphère:</span>
                        <span>{{ $recette->oeil_droit_sphere ?? '-' }}</span>
                    </div>
                    <div class="prescription-row">
                        <span>Cylindre:</span>
                        <span>{{ $recette->oeil_droit_cylindre ?? '-' }}</span>
                    </div>
                    <div class="prescription-row">
                        <span>Axe:</span>
                        <span>{{ $recette->oeil_droit_axe ?? '-' }}</span>
                    </div>
                    <div class="prescription-row">
                        <span>Addition:</span>
                        <span>{{ $recette->oeil_droit_addition ?? '-' }}</span>
                    </div>
                </div>
                <div class="prescription-section">
                    <h5>Œil Gauche</h5>
                    <div class="prescription-row">
                        <span>Sphère:</span>
                        <span>{{ $recette->oeil_gauche_sphere ?? '-' }}</span>
                    </div>
                    <div class="prescription-row">
                        <span>Cylindre:</span>
                        <span>{{ $recette->oeil_gauche_cylindre ?? '-' }}</span>
                    </div>
                    <div class="prescription-row">
                        <span>Axe:</span>
                        <span>{{ $recette->oeil_gauche_axe ?? '-' }}</span>
                    </div>
                    <div class="prescription-row">
                        <span>Addition:</span>
                        <span>{{ $recette->oeil_gauche_addition ?? '-' }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="product-info">
            <h5>Produits</h5>
            <div class="prescription-row">
                <span>Monture:</span>
                <span>{{ $recette->monture->model_monture }}</span>
            </div>
            <div class="prescription-row">
                <span>Type de Verre:</span>
                <span>{{ $recette->type_verre }}</span>
            </div>
        </div>

        <div class="financial-info">
            <h5>Informations Financières</h5>
            <div class="financial-row">
                <span>Total:</span>
                <span>{{ number_format($recette->total, 2, ',', ' ') }} DA</span>
            </div>
            <div class="financial-row">
                <span>Montant Payé:</span>
                <span>{{ number_format($recette->montant_paye, 2, ',', ' ') }} DA</span>
            </div>
            <div class="financial-row">
                <span>Reste à Payer:</span>
                <span>{{ number_format($recette->reste_a_payer, 2, ',', ' ') }} DA</span>
            </div>
        </div>

        @if($recette->notes)
        <div class="notes">
            <h5>Notes</h5>
            <p>{{ $recette->notes }}</p>
        </div>
        @endif

        <div class="invoice-footer">
            <div class="text-end">
                <p>Signature</p>
                <div class="signature-line"></div>
            </div>
        </div>
    </div>
</body>
</html> 