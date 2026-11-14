<!DOCTYPE html> 
<html lang="id"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Guru - Panel Akademik</title> 
    <style> 
        :root {
            --primary: #2563eb;
            --primary-hover: #1d4ed8;
            --danger: #dc2626;
            --danger-hover: #b91c1c;
            --bg-body: #f8fafc;
            --bg-card: #ffffff;
            --text-main: #334155;
            --border-color: #cbd5e1;
        }

        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background-color: var(--bg-body); 
            color: var(--text-main);
            margin: 0; 
            padding: 30px; 
        } 

        nav {
            margin-bottom: 25px;
            background: var(--bg-card);
            padding: 12px 20px;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }

        nav a { 
            margin-right: 20px; 
            text-decoration: none; 
            color: var(--primary); 
            font-weight: 600;
        } 

        nav a:hover {
            text-decoration: underline;
        }

        .kotak { 
            background: var(--bg-card); 
            padding: 24px; 
            border-radius: 12px; 
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05), 0 2px 4px -1px rgba(0,0,0,0.03);
            max-width: 900px;
            margin: 0 auto;
        } 

        h1 { 
            color: #1e293b; 
            font-size: 1.5rem;
            margin-top: 0;
            border-bottom: 2px solid #e2e8f0;
            padding-bottom: 10px;
        } 

        h2 {
            font-size: 1.2rem;
            color: #475569;
            margin-top: 20px;
        }

        /* Alert Styling */
        .alert-error {
            background-color: #fef2f2;
            border-left: 4px solid var(--danger);
            color: #991b1b;
            padding: 12px 16px;
            border-radius: 4px;
            margin-bottom: 16px;
        }

        .alert-error ul {
            margin: 0;
            padding-left: 20px;
        }

        .alert-success {
            background-color: #f0fdf4;
            border-left: 4px solid #16a34a;
            color: #166534;
            padding: 12px 16px;
            border-radius: 4px;
            margin-bottom: 16px;
        }

        /* Form Styling */
        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: 600;
            font-size: 0.9rem;
            display: inline-block;
            margin-bottom: 5px;
        }

        input[type="text"], input[type="number"], select {
            width: 100%;
            padding: 9px 12px;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            font-size: 0.95rem;
            box-sizing: border-box;
            transition: border-color 0.2s;
        }

        input[type="text"]input[type="number"]:focus, select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        button[type="submit"] {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 10px 18px;
            font-size: 0.95rem;
            font-weight: 600;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        button[type="submit"]:hover {
            background-color: var(--primary-hover);
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            border: 1px solid #e2e8f0;
        }

        th {
            background-color: #f1f5f9;
            color: #475569;
            font-weight: 600;
            text-align: left;
            padding: 12px 14px;
            font-size: 0.9rem;
            border-bottom: 1px solid #e2e8f0;
        }

        td {
            padding: 12px 14px;
            border-bottom: 1px solid #f1f5f9;
            font-size: 0.9rem;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover td {
            background-color: #f8fafc;
        }

        /* Tombol Hapus Kecil di Tabel */
        .btn-delete {
            background-color: var(--danger);
            color: white;
            border: none;
            padding: 6px 12px;
            font-size: 0.85rem;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
        }

        .btn-delete:hover {
            background-color: var(--danger-hover);
        }

        .text-center {
            text-align: center;
            color: #64748b;
        }
    </style> 
</head> 
<body>

     <nav> 
        <a href="{{route('inventaris.index')}}">Data Inventaris</a> 
        <a href="{{route('inventaris.create')}}">Tambah Data Inventaris</a> 
    </nav>  

    <div class="kotak"> 
                <h2 style="margin-top: 35px;">Daftar Inventaris</h2>

        <table> 
            <thead>
                <tr> 
                    <th>Kode Barang</th> 
                    <th>Nama Barang</th> 
                    <th>Kondisi Barang</th> 
                    <th>Jumlah Barang</th> 
                    <th style="width: 90px; text-align: center;">Aksi</th>
                </tr> 
            </thead>
            <tbody>
                @forelse ($dataInventaris as $inventaris) 
                    <tr> 
                        <td>{{ $inventaris->kode_barang }}</td> 
                        <td>{{ $inventaris->nama_barang }}</td> 
                        <td>{{ $inventaris->kondisi }}</td> 
                        <td>{{ $inventaris->jumlah }}</td> 

                        <td style="text-align: center;"> 
                            <form action="{{ route('inventaris.destroy', $inventaris->id) }}" method="POST" style="display:inline;">
                                @csrf 
                                @method('DELETE') 
                                <button type="submit" class="btn-delete" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button> 
                            </form> 
                        </td>
                    </tr> 
                @empty 
                    <tr> 
                        <td colspan="5" class="text-center" style="padding: 20px;">Belum ada data inventaris yang tersimpan.</td> 
                    </tr> 
                @endforelse 
            </tbody>
        </table> 
    </div> 

</body> 
</html>