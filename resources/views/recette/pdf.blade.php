<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Recette - REC-{{ str_pad($recette->id, 6, '0', STR_PAD_LEFT) }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            font-size: 10px;
        }
        .page {
            width: 210mm;
            height: 297mm;
            margin: 0 auto;
            padding: 10mm;
            box-sizing: border-box;
        }
        .header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10mm;
            padding-bottom: 5mm;
            border-bottom: 1px solid #ddd;
        }
        .logo {
            max-width: 40mm;
            max-height: 20mm;
        }
        .opticien-info {
            text-align: right;
        }
        .opticien-info h2 {
            margin: 0;
            font-size: 12px;
            color: #2c3e50;
        }
        .opticien-info p {
            margin: 2px 0;
            font-size: 9px;
            color: #666;
        }
        .invoice-title {
            text-align: center;
            margin: 5mm 0;
        }
        .invoice-title h1 {
            margin: 0;
            font-size: 14px;
            color: #2c3e50;
        }
        .invoice-title p {
            margin: 2px 0;
            font-size: 10px;
            color: #666;
        }
        .grid-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 5mm;
            margin-bottom: 5mm;
        }
        .section {
            background: #f9f9f9;
            padding: 3mm;
            border-radius: 2mm;
        }
        .section-title {
            font-size: 10px;
            color: #2c3e50;
            margin-bottom: 2mm;
            padding-bottom: 1mm;
            border-bottom: 1px solid #eee;
        }
        .info-group {
            display: grid;
            grid-template-columns: 1fr 1fr;
            margin-bottom: 1mm;
        }
        .info-label {
            font-weight: bold;
            color: #666;
        }
        .info-value {
            color: #333;
        }
        .prescription-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3mm;
        }
        .prescription-section {
            background: #fff;
            padding: 2mm;
            border-radius: 2mm;
            border: 1px solid #eee;
        }
        .prescription-section h4 {
            margin: 0 0 2mm 0;
            font-size: 10px;
            color: #2c3e50;
        }
        .financial-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2mm;
        }
        .financial-item {
            display: flex;
            justify-content: space-between;
            padding: 2mm;
            background: #fff;
            border-radius: 2mm;
            border: 1px solid #eee;
        }
        .total {
            font-weight: bold;
            color: #2c3e50;
        }
        .footer {
            margin-top: 5mm;
            padding-top: 2mm;
            border-top: 1px solid #ddd;
            text-align: center;
            color: #666;
            font-size: 8px;
        }
        .signature {
            margin-top: 10mm;
            text-align: right;
        }
        .signature-line {
            width: 50mm;
            border-top: 1px solid #000;
            margin-top: 2mm;
        }
        @page {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="page">
        <div class="header">
            <div class="logo-container">
                @if($opticienInfo && $opticienInfo->logo)
                    <img src="{{ public_path('storage/' . $opticienInfo->logo) }}" alt="Logo" class="logo">
                @else
                    <img src="{{ public_path('assets/img/logo.jpg') }}" alt="Logo" class="logo">
                @endif
            </div>
            <div class="opticien-info">
                <h2>{{ $opticienInfo->nom_entreprise ?? 'DigiOptics' }}</h2>
                <p>{{ $opticienInfo->adresse ?? '' }}</p>
                <p>{{ $opticienInfo->code_postal ?? '' }} {{ $opticienInfo->ville ?? '' }}</p>
                <p>Tél: {{ $opticienInfo->telephone ?? '' }}</p>
                <p>Email: {{ $opticienInfo->email ?? '' }}</p>
            </div>
        </div>

        <div class="invoice-title">
            <h1>Recette</h1>
            <p>N°: REC-{{ str_pad($recette->id, 6, '0', STR_PAD_LEFT) }}</p>
        </div>

        <div class="grid-container">
            <div class="section">
                <h3 class="section-title">Informations du Client</h3>
                <div class="info-group">
                    <div class="info-label">Nom</div>
                    <div class="info-value">{{ $recette->client_nom }} {{ $recette->client_prenom }}</div>
                </div>
                <div class="info-group">
                    <div class="info-label">Téléphone</div>
                    <div class="info-value">{{ $recette->client_telephone }}</div>
                </div>
            </div>

            <div class="section">
                <h3 class="section-title">Produits</h3>
                <div class="info-group">
                    <div class="info-label">Monture</div>
                    <div class="info-value">{{ $recette->monture->model_monture }}</div>
                </div>
                <div class="info-group">
                    <div class="info-label">Type de Verre</div>
                    <div class="info-value">{{ $recette->type_verre }}</div>
                </div>
            </div>
        </div>

        <div class="section">
            <h3 class="section-title">Prescription</h3>
            <div class="prescription-grid">
                <div class="prescription-section">
                    <h4>Œil Droit</h4>
                    <div class="info-group">
                        <div class="info-label">Sphère</div>
                        <div class="info-value">{{ $recette->oeil_droit_sphere ?? '-' }}</div>
                    </div>
                    <div class="info-group">
                        <div class="info-label">Cylindre</div>
                        <div class="info-value">{{ $recette->oeil_droit_cylindre ?? '-' }}</div>
                    </div>
                    <div class="info-group">
                        <div class="info-label">Axe</div>
                        <div class="info-value">{{ $recette->oeil_droit_axe ?? '-' }}</div>
                    </div>
                    @if($recette->oeil_droit_addition)
                    <div class="info-group">
                        <div class="info-label">Addition</div>
                        <div class="info-value">{{ $recette->oeil_droit_addition }}</div>
                    </div>
                    @endif
                </div>
                <div class="prescription-section">
                    <h4>Œil Gauche</h4>
                    <div class="info-group">
                        <div class="info-label">Sphère</div>
                        <div class="info-value">{{ $recette->oeil_gauche_sphere ?? '-' }}</div>
                    </div>
                    <div class="info-group">
                        <div class="info-label">Cylindre</div>
                        <div class="info-value">{{ $recette->oeil_gauche_cylindre ?? '-' }}</div>
                    </div>
                    <div class="info-group">
                        <div class="info-label">Axe</div>
                        <div class="info-value">{{ $recette->oeil_gauche_axe ?? '-' }}</div>
                    </div>
                    @if($recette->oeil_gauche_addition)
                    <div class="info-group">
                        <div class="info-label">Addition</div>
                        <div class="info-value">{{ $recette->oeil_gauche_addition }}</div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="section">
            <h3 class="section-title">Informations Financières</h3>
            <div class="financial-info">
                <div class="financial-item">
                    <span>Prix Monture:</span>
                    <span>{{ number_format($recette->monture_price, 2, ',', ' ') }} DA</span>
                </div>
                <div class="financial-item">
                    <span>Prix Verres:</span>
                    <span>{{ number_format($recette->lens_price, 2, ',', ' ') }} DA</span>
                </div>
                <div class="financial-item total">
                    <span>Total:</span>
                    <span>{{ number_format($recette->total, 2, ',', ' ') }} DA</span>
                </div>
                <div class="financial-item">
                    <span>Montant Payé:</span>
                    <span>{{ number_format($recette->montant_paye, 2, ',', ' ') }} DA</span>
                </div>
                <div class="financial-item">
                    <span>Reste à Payer:</span>
                    <span>{{ number_format($recette->reste_a_payer, 2, ',', ' ') }} DA</span>
                </div>
            </div>
        </div>

        @if($recette->notes)
        <div class="section">
            <h3 class="section-title">Notes</h3>
            <p>{{ $recette->notes }}</p>
        </div>
        @endif

        <div class="signature">
            <p>Signature</p>
            <div class="signature-line"></div>
        </div>

        <div class="footer">
            <p>Merci de votre confiance</p>
            <p>{{ $opticienInfo->nom_entreprise ?? 'DigiOptics' }}</p>
        </div>
    </div>
</body>
</html> 