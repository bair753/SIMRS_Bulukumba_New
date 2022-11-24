VERSION 5.00
Object = "{C4847593-972C-11D0-9567-00A0C9273C2A}#8.0#0"; "crviewer.dll"
Begin VB.Form frmCRCetakKuitansiPasienV2 
   Caption         =   "Transmedic"
   ClientHeight    =   7005
   ClientLeft      =   60
   ClientTop       =   345
   ClientWidth     =   5820
   Icon            =   "frmCetakKuitansiPasienV2.frx":0000
   LinkTopic       =   "Form1"
   ScaleHeight     =   7005
   ScaleWidth      =   5820
   WindowState     =   2  'Maximized
   Begin VB.CommandButton cmdOption 
      Caption         =   "Option"
      BeginProperty Font 
         Name            =   "Tahoma"
         Size            =   8.25
         Charset         =   0
         Weight          =   400
         Underline       =   0   'False
         Italic          =   0   'False
         Strikethrough   =   0   'False
      EndProperty
      Height          =   315
      Left            =   4920
      TabIndex        =   4
      Top             =   480
      Width           =   975
   End
   Begin VB.CommandButton cmdCetak 
      Caption         =   "Cetak"
      BeginProperty Font 
         Name            =   "Tahoma"
         Size            =   8.25
         Charset         =   0
         Weight          =   400
         Underline       =   0   'False
         Italic          =   0   'False
         Strikethrough   =   0   'False
      EndProperty
      Height          =   315
      Left            =   3960
      TabIndex        =   3
      Top             =   480
      Width           =   975
   End
   Begin VB.ComboBox cboPrinter 
      BeginProperty Font 
         Name            =   "Tahoma"
         Size            =   8.25
         Charset         =   0
         Weight          =   400
         Underline       =   0   'False
         Italic          =   0   'False
         Strikethrough   =   0   'False
      EndProperty
      Height          =   315
      Left            =   960
      TabIndex        =   2
      Top             =   480
      Width           =   3015
   End
   Begin CRVIEWERLibCtl.CRViewer CRViewer1 
      Height          =   7000
      Left            =   0
      TabIndex        =   0
      Top             =   0
      Width           =   5800
      DisplayGroupTree=   -1  'True
      DisplayToolbar  =   -1  'True
      EnableGroupTree =   0   'False
      EnableNavigationControls=   -1  'True
      EnableStopButton=   -1  'True
      EnablePrintButton=   -1  'True
      EnableZoomControl=   -1  'True
      EnableCloseButton=   -1  'True
      EnableProgressControl=   -1  'True
      EnableSearchControl=   -1  'True
      EnableRefreshButton=   -1  'True
      EnableDrillDown =   -1  'True
      EnableAnimationControl=   -1  'True
      EnableSelectExpertButton=   -1  'True
      EnableToolbar   =   -1  'True
      DisplayBorder   =   -1  'True
      DisplayTabs     =   -1  'True
      DisplayBackgroundEdge=   -1  'True
      SelectionFormula=   ""
      EnablePopupMenu =   -1  'True
      EnableExportButton=   -1  'True
      EnableSearchExpertButton=   -1  'True
      EnableHelpButton=   -1  'True
   End
   Begin VB.TextBox txtNamaFormPengirim 
      Height          =   495
      Left            =   3120
      TabIndex        =   1
      Top             =   600
      Width           =   2175
   End
End
Attribute VB_Name = "frmCRCetakKuitansiPasienV2"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Option Explicit
Dim Report As New crKuitansiPasien
'Dim Report As New crKuitansiPasienNew
Dim bolSuppresDetailSection10 As Boolean
Dim ii As Integer
Dim tempPrint1 As String
Dim p As Printer
Dim p2 As Printer
Dim strDeviceName As String
Dim strDriverName As String
Dim strPort As String

Private Sub cmdCetak_Click()
    Report.SelectPrinter "winspool", cboPrinter.Text, "Ne00:"
    'PrinterNama = cboPrinter.Text
    Report.PrintOut False
End Sub

Private Sub CmdOption_Click()
    Report.PrinterSetup Me.hwnd
    CRViewer1.Refresh
End Sub

Private Sub Form_Load()
    Dim p As Printer
    cboPrinter.Clear
    For Each p In Printers
        cboPrinter.AddItem p.DeviceName
    Next
    cboPrinter.Text = GetTxt("Setting.ini", "Printer", "Kwitansi")
End Sub

Private Sub Form_Resize()
    CRViewer1.Top = 0
    CRViewer1.Left = 0
    CRViewer1.Height = ScaleHeight
    CRViewer1.Width = ScaleWidth
End Sub

Private Sub Form_Unload(Cancel As Integer)

    Set frmCRCetakKuitansiPasienV2 = Nothing
End Sub

Public Sub CetakUlangJenisKuitansi(strNoregistrasi As String, jumlahCetak As Integer, strIdPegawai As String, STD As String, view As String)
'On Error GoTo errLoad
Dim strKet As Boolean
Dim jenisKwitansi As String
Dim NamaKasir As String
Dim jenisLayanan

    strKet = True
    
    Set frmCRCetakKuitansiPasienV2 = Nothing
    Set Report = New crKuitansiPasien
    If Len(strNoregistrasi) = 10 Then
        ReadRs "select pd.noregistrasi,sbp.totaldibayar,ps.namapasien, sbp.keteranganlainnya,pd.nocmfk,ru.namaruangan,pg.namalengkap,ps.nocm, " & _
               "pd.tglregistrasi,pd.tglpulang,to_char(sbp.tglsbm, 'DD-MM-YYYY') as tanggal,sbp.nosbm as nobayar, " & _
               "CASE WHEN alm.alamatlengkap IS NULL THEN '' ELSE alm.alamatlengkap END AS alamat,'' AS jenislayanan " & _
               "from pasiendaftar_t as pd " & _
               "inner join strukpelayanan_t as sp on sp.noregistrasifk=pd.norec " & _
               "inner join strukbuktipenerimaan_t as sbp  on sbp.nostrukfk=sp.norec " & _
               "inner join pasien_m as ps on ps.id=pd.nocmfk " & _
               "left join alamat_m as alm on alm.nocmfk=ps.id " & _
               "inner join ruangan_m as ru on ru.id=pd.objectruanganlastfk " & _
               "inner join loginuser_s as lu on lu.id=sbp.objectpegawaipenerimafk " & _
               "inner join pegawai_m as pg on pg.id=lu.objectpegawaifk " & _
               "where pd.noregistrasi='" & strNoregistrasi & "'"
    End If
    If Len(strNoregistrasi) = 14 Then
        ReadRs "select sp.nostruk as noregistrasi,sp.totalharusdibayar as totaldibayar,sp.namapasien_klien as namapasien,pg.namalengkap, sp.keteranganlainnya,'Tindakan Non Layanan' as namaruangan,'-' as nocm, " & _
               "sp.tglstruk as tglregistrasi,sp.tglstruk as tglpulang,to_char(sbp.tglsbm, 'DD-MM-YYYY') as tanggal,sbp.nosbm as nobayar,'' as alamat, " & _
               " CASE WHEN ru.namaruangan IS NULL THEN '-' ELSE ru.namaruangan END AS namaruangan, " & _
               " CASE WHEN substring(sp.nostruk,1,2)='OB' THEN ' Obat Bebas' ELSE ' Non Layanan' END AS jenislayanan,to_char(sp.tglfaktur, 'DD-MM-YYYY') AS tgllahir,'Cara Bayar : Umum/Pribadi' AS jenisbayar " & _
               " FROM strukpelayanan_t as sp  " & _
               " inner join strukbuktipenerimaan_t as sbp on sbp.nostrukfk=sp.norec " & _
               " inner join loginuser_s as lu on lu.id=sbp.objectpegawaipenerimafk " & _
               " inner join pegawai_m as pg on pg.id=lu.objectpegawaifk " & _
               " LEFT JOIN ruangan_m AS ru ON ru.id = sp.objectruanganfk " & _
               " where sbp.nosbm='" & strNoregistrasi & "'"
    End If
    If Len(strNoregistrasi) > 14 Then
        If Left(strNoregistrasi, 7) = "DEPOSIT" Then
            strNoregistrasi = Replace(strNoregistrasi, "DEPOSIT", "")
            ReadRs "select sp.nostruk as noregistrasi,sbp.totaldibayar as totaldibayar, ps.namapasien as namapasien, " & _
                    "pg.namalengkap, sbp.keteranganlainnya,sbp.keteranganlainnya as namaruangan,ps.nocm as nocm, " & _
                    "sp.tglstruk as tglregistrasi,sp.tglstruk as tglpulang,to_char(sbp.tglsbm,'DD-MM-YYYY') as tanggal,sbp.nosbm as nobayar, " & _
                    "CASE WHEN alm.alamatlengkap IS NULL THEN '-' ELSE alm.alamatlengkap END AS alamat,'' AS jenislayanan,to_char(ps.tgllahir, 'DD-MM-YYYY') AS tgllahir,'Jenis Bayar : Pembayaran Deposit' AS jenisbayar " & _
                    "from strukpelayanan_t as sp " & _
                    "inner join strukbuktipenerimaan_t as sbp  on sbp.nostrukfk=sp.norec " & _
                    "left join loginuser_s as lu on lu.id=sbp.objectpegawaipenerimafk " & _
                    "left join pasien_m as ps on ps.id=sp.nocmfk " & _
                    "left join alamat_m as alm on alm.nocmfk=ps.id " & _
                    "left join pegawai_m as pg on pg.id=lu.objectpegawaifk " & _
                    "where sbp.nosbm='" & strNoregistrasi & "'"
            strKet = False
'            ReadRs "select sp.nostruk as noregistrasi,sp.totalharusdibayar as totaldibayar,sp.namapasien_klien as namapasien,pg.namalengkap, sp.keteranganlainnya,sp.keteranganlainnya as namaruangan,'-' as nocm from  " & _
'               " strukpelayanan_t as sp  " & _
'               "inner join strukbuktipenerimaan_t as sbp  on sbp.nostrukfk=sp.norec " & _
'               "left join loginuser_s as lu on lu.id=sbp.objectpegawaipenerimafk " & _
'               "left join pegawai_m as pg on pg.id=lu.objectpegawaifk " & _
'               "where sbp.nosbm='" & strNoregistrasi & "'"
        ElseIf Left(strNoregistrasi, 14) = "KEMBALIDEPOSIT" Then
            jenisKwitansi = "KEMBALIDEPOSIT"
            strNoregistrasi = Replace(strNoregistrasi, "KEMBALIDEPOSIT", "")
            ReadRs "select sbp.nosbm as noregistrasi,sbp.totaldibayar as totaldibayar,CASE WHEN ps.namapasien IS NULL THEN '' ELSE ps.namapasien END AS namapasien, " & _
                    "pg.namalengkap, sbp.keteranganlainnya,sbp.keteranganlainnya as namaruangan,CASE WHEN ps.nocm IS NULL THEN '' ELSE ps.nocm END as nocm, " & _
                    "sp.tglstruk as tglregistrasi,sbp.tglsbm as tglpulang,to_char(sbp.tglsbm, 'DD-MM-YYYY') as tanggal,sbp.nosbm as nobayar, " & _
                    "CASE WHEN alm.alamatlengkap IS NULL THEN '-' ELSE alm.alamatlengkap END AS alamat,'' AS jenislayanan,,to_char(ps.tgllahir, 'DD-MM-YYYY') AS tgllahir,'Jenis Bayar : Pengembalian Deposit' AS jenisbayar " & _
                    "FROM strukbuktipenerimaan_t AS sbp " & _
                    "LEFT JOIN strukpelayanan_t AS sp ON sp.norec = sbp.nostrukfk " & _
                    "left join loginuser_s as lu on lu.id=sbp.objectpegawaipenerimafk " & _
                    "left join pasien_m as ps on ps.id=sp.nocmfk " & _
                    "left join alamat_m as alm on alm.nocmfk=ps.id " & _
                    "left join pegawai_m as pg on pg.id=lu.objectpegawaifk " & _
                    "where sbp.nosbm='" & strNoregistrasi & "'"
            strKet = False
        ElseIf Left(strNoregistrasi, 13) = "KWITANSITOTAL" Then
            jenisKwitansi = "KWITANSITOTAL"
            strNoregistrasi = Replace(strNoregistrasi, "KWITANSITOTAL", "")
            ReadRs2 "select lu.objectpegawaifk,pg.namalengkap " & _
                    "from loginuser_s as lu " & _
                    "INNER JOIN pegawai_m as pg on pg.id =lu.objectpegawaifk " & _
                    "where lu.namauser='" & strIdPegawai & "'"
                    
            If Not RS2.EOF Then
                NamaKasir = RS2("namalengkap")
            Else
                NamaKasir = "-"
            End If
            
            ReadRs "select pd.noregistrasi as noregistrasi," & STD & " as totaldibayar,  ps.namapasien, '" & NamaKasir & "' as namalengkap, " & _
                   " '-' as keteranganlainnya,ru.namaruangan as namaruangan,ps.nocm, " & _
                   "pd.tglregistrasi,pd.tglpulang,'' as tanggal, " & _
                   "case when pd.nosbmlastfk is null then '' else sbm.nosbm end as nobayar, " & _
                   "CASE WHEN alm.alamatlengkap IS NULL THEN '-' ELSE alm.alamatlengkap END AS alamat,'' AS jenislayanan,to_char(ps.tgllahir, 'DD-MM-YYYY') AS tgllahir,'' AS jenisbayar " & _
                   "from pasiendaftar_t as pd " & _
                   "left join ruangan_m as ru on ru.id=pd.objectruanganlastfk " & _
                   "left join pasien_m as ps on ps.id=pd.nocmfk " & _
                   "left join alamat_m as alm on alm.nocmfk=ps.id " & _
                   "left join strukbuktipenerimaan_t as sbm on sbm.norec = pd.nosbmlastfk " & _
                   "where pd.noregistrasi='" & strNoregistrasi & "'"
            strKet = False
'            jumlahDuit = STD
            STD = ""
        ElseIf Left(strNoregistrasi, 14) = "CICILANTAGIHAN" Then
            jenisKwitansi = "CICILANTAGIHAN"
            strNoregistrasi = Replace(strNoregistrasi, "CICILANTAGIHAN", "")
            ReadRs "select pd.noregistrasi,sbp.totaldibayar,ps.namapasien, sbp.keteranganlainnya,pd.nocmfk,ru.namaruangan, " & _
                   "pg.namalengkap,ps.nocm,pd.tglregistrasi,pd.tglpulang,to_char(sbp.tglsbm, 'DD-MM-YYYY') as tanggal,sbp.nosbm as nobayar, " & _
                   "CASE WHEN alm.alamatlengkap IS NULL THEN '-' ELSE alm.alamatlengkap END AS alamat,'-' AS jenislayanan,to_char(ps.tgllahir, 'DD-MM-YYYY') AS tgllahir,'Cara Bayar : Cicilan Tagihan' AS jenisbayar " & _
                   "from strukbuktipenerimaan_t as sbp " & _
                   "inner join strukpelayanan_t as sp on sp.norec=sbp.nostrukfk " & _
                   "inner join pasien_m as ps on ps.id=sp.nocmfk " & _
                   "left join alamat_m as alm on alm.nocmfk=ps.id " & _
                   "inner join pasiendaftar_t as pd on pd.norec=sp.noregistrasifk " & _
                   "inner join ruangan_m as ru on ru.id=pd.objectruanganlastfk " & _
                   "inner join loginuser_s as lu on lu.id=sbp.objectpegawaipenerimafk " & _
                   "inner join pegawai_m as pg on pg.id=lu.objectpegawaifk " & _
                   "Where sbp.nosbm ='" & strNoregistrasi & "'"
        Else
            Dim noreg, nostruk As String
            noreg = Left(strNoregistrasi, 10)
            nostruk = Replace(strNoregistrasi, noreg, "")
            ReadRs " select pd.noregistrasi,sbp.totaldibayar,ps.namapasien, sbp.keteranganlainnya,pd.nocmfk,CASE WHEN ru.namaruangan IS NULL THEN '' ELSE ru.namaruangan END namaruangan,pg.namalengkap,ps.nocm, " & _
                   " pd.tglregistrasi,pd.tglpulang,to_char(sbp.tglsbm, 'DD-MM-YYYY') as tanggal,sbp.nosbm as nobayar, " & _
                   " CASE WHEN alm.alamatlengkap IS NULL THEN '-' ELSE alm.alamatlengkap END AS alamat, " & _
                   " CASE WHEN ru.objectdepartemenfk = 16 THEN dept.namadepartemen || '' || to_char(pd.tglregistrasi, 'DD-MM-YYYY') || 's/d' || to_char(pd.tglpulang, 'DD-MM-YYYY') ELSE " & _
                   " dept.namadepartemen || ' ' || to_char(pd.tglregistrasi, 'DD-MM-YYYY') END AS jenislayanan,to_char(ps.tgllahir, 'DD-MM-YYYY') AS tgllahir, " & _
                   " CASE WHEN pd.objectkelompokpasienlastfk IS NULL THEN '' ELSE 'Cara Bayar : ' || kp.kelompokpasien END AS jenisbayar " & _
                   " from pasiendaftar_t as pd " & _
                   " inner join strukpelayanan_t as sp on sp.noregistrasifk=pd.norec " & _
                   " inner join strukbuktipenerimaan_t as sbp  on sbp.nostrukfk=sp.norec " & _
                   " inner join pasien_m as ps on ps.id=pd.nocmfk " & _
                   " left join alamat_m as alm on alm.nocmfk=ps.id " & _
                   " inner join ruangan_m as ru on ru.id=pd.objectruanganlastfk " & _
                   " LEFT JOIN departemen_m AS dept ON dept.id = ru.objectdepartemenfk " & _
                   " inner join loginuser_s as lu on lu.id=sbp.objectpegawaipenerimafk " & _
                   " inner join pegawai_m as pg on pg.id=lu.objectpegawaifk " & _
                   " LEFT JOIN kelompokpasien_m AS kp ON kp.id = pd.objectkelompokpasienlastfk " & _
                   " where pd.noregistrasi='" & noreg & "' and sp.norec='" & nostruk & "' "
        End If
    End If
    
    Dim i As Integer
    Dim jumlahDuit As Double
    Dim kembaliDeposit As Boolean
    Dim pembulatan As Double
    Dim hasilPembulatan As Double
    Dim hasilbulat As Double
    Dim total As Double
    Dim temp As Double
    Dim Hasil As Double
    Dim jumlah As Double
    Dim bulatan As String
    For i = 0 To rs.RecordCount - 1
        jumlahDuit = jumlahDuit + CDbl(Round(rs!totaldibayar))
        rs.MoveNext
    Next
    rs.MoveFirst
    
    kembaliDeposit = False
    If jumlahDuit < 0 Then
        kembaliDeposit = True
    End If
    
    With Report
        If Not rs.EOF Then
            If IsNull(rs("jenislayanan")) = True Then
                jenisLayanan = " "
            Else
                jenisLayanan = rs("jenislayanan")
            End If
            
            .txtNoBKM.SetText rs("noregistrasi")
            .txtNoBayar.SetText rs("nobayar")
            If STD = "" Then
                .txtNamaPenyetor.SetText UCase(rs("namapasien")) ' & "," & rs("alamat")
            Else
                .txtNamaPenyetor.SetText UCase(STD)
            End If
            .txtNamaPasien.SetText UCase(rs("namapasien"))
            If jenisKwitansi = "KEMBALIDEPOSIT" Then
                .txtNamaPenyetor.SetText "RSUD CIBINONG"
            End If
            If strKet = True Then
                .txtKeterangan.SetText UCase("Biaya Layanan " & rs("namaruangan") & " " & jenisLayanan) 'rs("jenislayanan") 'RS("keteranganlainnya")
            Else
                If kembaliDeposit = False Then
                    .txtKeterangan.SetText UCase(rs("namaruangan"))  'RS("keteranganlainnya")
                Else
                    .txtKeterangan.SetText Replace(UCase(rs("namaruangan")), "PEMBAYARAN", "PENGEMBALIAN")
                    jumlahDuit = jumlahDuit * (-1)
                End If
            End If
            .txtNamaRs1.SetText strNamaLengkapRs
            .txtNamaRs.SetText UCase(strNamaRS)
            .txtAlamatRs.SetText strAlamatRS & ", " & strKodePos & ", " & strNoTlpn & ", " & strNoFax
            .txtNamaKota.SetText strNamaKota & ", "
'            .txtKeterangan.SetText "Biaya Perawatan Pasien"
            .txtRp.SetText "Rp. " & Format(jumlahDuit, "##,##0.00")
            .txtTerbilang.SetText TerbilangDesimal(CStr(jumlahDuit))
            bulatan = Right(CStr(jumlahDuit), 2)
            Hasil = Val(jumlahDuit - Val(bulatan))
            If Val(Right(jumlahDuit, 2)) <> 0 Then
                If Val(Right(jumlahDuit, 2)) >= 50 Then
                    pembulatan = 100 - Val(Right(jumlahDuit, 2))
                    jumlahDuit = Val(jumlahDuit) + pembulatan
                ElseIf Val(Right(jumlahDuit, 2)) < 50 Then
                    pembulatan = 100 - Val(Right(jumlahDuit, 2))
                    jumlahDuit = Val(jumlahDuit) + pembulatan
                End If
            Else
                pembulatan = 0
            End If
            .txtBulat.SetText "Rp. " & Format(pembulatan, "##,##0.00")
            .txtJmlTotal.SetText "Rp. " & Format(jumlahDuit, "##,##0.00")
'            .txtRp.SetText "Rp. " & Format(11789104, "##,##0.00")
            .txtRuangan.SetText UCase(rs("namaruangan"))
            .txtNoPen2.SetText rs("nocm") & "/ " & rs("tgllahir")  'rs("nocm") rs("noregistrasi")
            .txtnocm2.SetText rs("nocm")
            .txtJnsKelamin.SetText rs("nocm")
            .txtPrintTglBKM.SetText rs("tanggal")
            .txtPetugasKasir.SetText rs("namalengkap")
            .txtJenisPasien.SetText rs("jenisbayar")
            '.txtTglSbm.SetText Format(RS("tanggal"), "dd-MM-yyyy")
'            .txtTglMasuk.SetText RS("tglpulang")
            '.udtTanggal.SetUnboundFieldSource ado{"()"}
            If jenisKwitansi = "KEMBALIDEPOSIT" Then
                .txtPetugasKasir.SetText rs("namapasien")
            End If
            .txtDesc.SetText UCase("NAMA/MR/No.REG  : " & rs("namapasien") & "/ " & rs("nocm") & "/ " & rs("noregistrasi"))
'            .txtDesc.SetText UCase("NAMA/MR/No.REG  : " & RS("namapasien") & "/ " & RS("nocm") & "/ " & "1711001100")
            .txtPetugasCetak.SetText strIdPegawai
            
            If view = "false" Then
                Dim strPrinter As String
'
                strPrinter = GetTxt("Setting.ini", "Printer", "Kwitansi")
                Report.SelectPrinter "winspool", strPrinter, "Ne00:"
                Report.PrintOut False
                Unload Me
            Else
                With CRViewer1
                    .ReportSource = Report
                    .ViewReport
                    .Zoom 1
                End With
                Me.Show
            End If
        End If
    End With
Exit Sub
errLoad:
End Sub

