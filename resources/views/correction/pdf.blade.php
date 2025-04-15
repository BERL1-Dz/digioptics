<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Correction Prescription</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 10px;
            font-size: 12px;
        }
        .header {
            text-align: center;
            margin-bottom: 15px;
            border-bottom: 1px solid #333;
            padding-bottom: 10px;
        }
        .clinic-info {
            margin-bottom: 10px;
        }
        .clinic-info h2 {
            margin: 5px 0;
            font-size: 16px;
        }
        .patient-info {
            margin-bottom: 15px;
        }
        .prescription-details {
            margin-bottom: 15px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
            font-size: 11px;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 4px;
            text-align: left;
        }
        .table th {
            background-color: #f2f2f2;
        }
        .signature-section {
            margin-top: 20px;
            text-align: right;
            font-size: 11px;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 10px;
            color: #666;
        }
        .row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -5px;
        }
        .col {
            flex: 1;
            padding: 0 5px;
        }
        h3 {
            margin: 5px 0;
            font-size: 14px;
        }
        h4 {
            margin: 5px 0;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1 style="font-size: 18px; margin: 5px 0;">Correction Prescription</h1>
        <div class="clinic-info">
            <h2>{{ $opticienInfo->name ?? 'DigiOptics' }}</h2>
            <p style="margin: 2px 0;">{{ $opticienInfo->address ?? '123 Clinic Street, City, Country' }}</p>
            <p style="margin: 2px 0;">Phone: {{ $opticienInfo->phone ?? '(123) 456-7890' }}</p>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="patient-info">
                <h3>Patient Information</h3>
                <p style="margin: 2px 0;"><strong>Name:</strong> {{ $patient->nom }} {{ $patient->prenom }}</p>
                <p style="margin: 2px 0;"><strong>Date of Birth:</strong> {{ $patient->date_naissance }}</p>
                <p style="margin: 2px 0;"><strong>Phone:</strong> {{ $patient->telephone }}</p>
            </div>
        </div>
        <div class="col">
            <div class="prescription-details">
                <h3>Prescription Details</h3>
                <table class="table">
                    <tr>
                        <th>Type of Vision</th>
                        <td>{{ $correction->type_vision }}</td>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <td>{{ $correction->date }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <h4>Right Eye (OD)</h4>
            <table class="table">
                <tr>
                    <th>SPH</th>
                    <th>CYL</th>
                    <th>AXE</th>
                    <th>ADD</th>
                </tr>
                <tr>
                    <td>{{ $correction->sph_od }}</td>
                    <td>{{ $correction->cly_od }}</td>
                    <td>{{ $correction->axe_od }}</td>
                    <td>{{ $correction->add_od }}</td>
                </tr>
            </table>
        </div>
        <div class="col">
            <h4>Left Eye (OG)</h4>
            <table class="table">
                <tr>
                    <th>SPH</th>
                    <th>CYL</th>
                    <th>AXE</th>
                    <th>ADD</th>
                </tr>
                <tr>
                    <td>{{ $correction->sph_og }}</td>
                    <td>{{ $correction->cly_og }}</td>
                    <td>{{ $correction->axe_og }}</td>
                    <td>{{ $correction->add_og }}</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <h4>Additional Information</h4>
            <table class="table">
                <tr>
                    <th>PD</th>
                    <td>{{ $correction->PD }}</td>
                </tr>
                <tr>
                    <th>Near PD</th>
                    <td>{{ $correction->Near_Pd }}</td>
                </tr>
                <tr>
                    <th>Options</th>
                    <td>{{ $correction->option }}</td>
                </tr>
                @if($monture)
                <tr>
                    <th>Frame</th>
                    <td>{{ $monture->nom }}</td>
                </tr>
                @endif
            </table>
        </div>
    </div>

    <div class="signature-section">
        <p style="margin: 2px 0;">Optometrist's Signature: ___________________</p>
        <p style="margin: 2px 0;">Date: ___________________</p>
    </div>

    <div class="footer">
        <p style="margin: 2px 0;">This prescription is valid for 1 year from the date of issue.</p>
        <p style="margin: 2px 0;">© {{ date('Y') }} {{ $opticienInfo->name ?? 'DigiOptics' }}. All rights reserved.</p>
    </div>
</body>
</html> 