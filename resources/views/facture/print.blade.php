<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture</title>
    <style>
        @page {
            size: A4;
            margin: 0;
        }
        body {
            margin: 20mm;
            font-family: Arial, sans-serif;
            font-size: 12pt;
            line-height: 1.4;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .company-name {
            font-size: 24pt;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }
        .company-info {
            font-size: 10pt;
            color: #666;
            margin-bottom: 20px;
        }
        .invoice-details {
            margin: 20px 0;
            border: 1px solid #ddd;
            padding: 10px;
            background-color: #f9f9f9;
        }
        .patient-info {
            margin: 20px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f5f5f5;
        }
        .total-row {
            font-weight: bold;
            background-color: #f5f5f5;
        }
        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 10pt;
            color: #666;
            position: fixed;
            bottom: 20mm;
            width: calc(100% - 40mm);
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="company-name">{{ $opticienInfo->nom_entreprise ?? 'OPTICIEN' }}</div>
        <div class="company-info">
            {{ $opticienInfo->adresse ?? '' }}<br>
            Tél: {{ $opticienInfo->telephone ?? '' }}<br>
            Email: {{ $opticienInfo->email ?? '' }}
        </div>
    </div>

    <div class="invoice-details">
        <strong>Facture N°:</strong> {{ $facture->numero }}<br>
        <strong>Date:</strong> {{ date('d/m/Y', strtotime($facture->created_at)) }}
    </div>

    <div class="patient-info">
        <strong>Patient:</strong> {{ $facture->patient->nom ?? '' }} {{ $facture->patient->prenom ?? '' }}<br>
        <strong>Adresse:</strong> {{ $facture->patient->adresse ?? '' }}<br>
        <strong>Téléphone:</strong> {{ $facture->patient->phone ?? '' }}
    </div>

    <table>
        <thead>
            <tr>
                <th>Désignation</th>
                <th>Quantité</th>
                <th>Prix Unitaire</th>
                <th>Montant</th>
            </tr>
        </thead>
        <tbody>
            @foreach($facture->details as $detail)
            <tr>
                <td>{{ $detail['description'] }}</td>
                <td>{{ $detail['quantite'] }}</td>
                <td>{{ number_format($detail['p_unitaire'], 2, ',', ' ') }} DA</td>
                <td>{{ number_format($detail['montant'], 2, ',', ' ') }} DA</td>
            </tr>
            @endforeach
            <tr class="total-row">
                <td colspan="3" style="text-align: right"><strong>Total TTC</strong></td>
                <td><strong>{{ number_format($facture->total, 2, ',', ' ') }} DA</strong></td>
            </tr>
        </tbody>
    </table>

    <div class="footer">
        {{ $opticienInfo->nom_entreprise ?? 'OPTICIEN' }} - {{ $opticienInfo->addresse ?? '' }}<br>
        Tél: {{ $opticienInfo->telephone ?? '' }} - Email: {{ $opticienInfo->email ?? '' }}
    </div>
</body>
</html> 