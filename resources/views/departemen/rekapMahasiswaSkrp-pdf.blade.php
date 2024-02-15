<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>
    <div>
        <table>
            <!-- Added p-4 for padding -->
            <thead>
                <tr class="text-center">
                    <td class="border text-center" colspan="2">2017</td>
                    <td class="border" colspan="2">2018</td>
                    <td class="border" colspan="2">2019</td>
                    <td class="border" colspan="2">2020</td>
                    <td class="border" colspan="2">2021</td>
                    <td class="border" colspan="2">2022</td>
                    <td class="border" colspan="2">2023</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border">Belum Lulus</td>
                    <td class="border">Lulus</td>
                    <td class="border">Belum Lulus</td>
                    <td class="border">Lulus</td>
                    <td class="border">Belum Lulus</td>
                    <td class="border">Lulus</td>
                    <td class="border">Belum Lulus</td>
                    <td class="border">Lulus</td>
                    <td class="border">Belum Lulus</td>
                    <td class="border">Lulus</td>
                    <td class="border">Belum Lulus</td>
                    <td class="border">Lulus</td>
                    <td class="border">Belum Lulus</td>
                    <td class="border">Lulus</td>
                </tr>
                <tr>
                    <td class="border">{{ isset($mahasiswaAngkPklLulus1S) ? $mahasiswaAngkPklLulus1S->count() : 0 }}</td>
                    <td class="border">{{ isset($mahasiswaAngkPklBelumLulus1S) ? $mahasiswaAngkPklBelumLulus1S->count() : 0 }}</td>
                    <td class="border">{{ isset($mahasiswaAngkPklLulus2S) ? $mahasiswaAngkPklLulus2S->count() : 0 }}</td>
                    <td class="border">{{ isset($mahasiswaAngkPklBelumLulus2S) ? $mahasiswaAngkPklBelumLulus2S->count() : 0 }}</td>
                    <td class="border">{{ isset($mahasiswaAngkPklLulus3S) ? $mahasiswaAngkPklLulus3S->count() : 0 }}</td>
                    <td class="border">{{ isset($mahasiswaAngkPklBelumLulus3S) ? $mahasiswaAngkPklBelumLulus3S->count() : 0 }}</td>
                    <td class="border">{{ isset($mahasiswaAngkPklLulus4S) ? $mahasiswaAngkPklLulus4S->count() : 0 }}</td>
                    <td class="border">{{ isset($mahasiswaAngkPklBelumLulus4S) ? $mahasiswaAngkPklBelumLulus4S->count() : 0 }}</td>
                    <td class="border">{{ isset($mahasiswaAngkPklLulus5S) ? $mahasiswaAngkPklLulus5S->count() : 0 }}</td>
                    <td class="border">{{ isset($mahasiswaAngkPklBelumLulus5S) ? $mahasiswaAngkPklBelumLulus5S->count() : 0 }}</td>
                    <td class="border">{{ isset($mahasiswaAngkPklLulus6S) ? $mahasiswaAngkPklLulus6S->count() : 0 }}</td>
                    <td class="border">{{ isset($mahasiswaAngkPklBelumLulus6S) ? $mahasiswaAngkPklBelumLulus6S->count() : 0 }}</td>
                    <td class="border">{{ isset($mahasiswaAngkPklLulus7S) ? $mahasiswaAngkPklLulus7S->count() : 0 }}</td>
                    <td class="border">{{ isset($mahasiswaAngkPklLulus7S) ? $mahasiswaAngkPklLulus7S->count() : 0 }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
