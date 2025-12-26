VERSION 5.00
Object = "{C4847593-972C-11D0-9567-00A0C9273C2A}#8.0#0"; "crviewer.dll"
Begin VB.Form frmLaporanPenerimaanTindakanPoli 
   Caption         =   "Transmedic"
   ClientHeight    =   7005
   ClientLeft      =   60
   ClientTop       =   345
   ClientWidth     =   6990
   Icon            =   "frmLaporanPenerimaanTindakanPoli.frx":0000
   LinkTopic       =   "Form1"
   ScaleHeight     =   7005
   ScaleWidth      =   6990
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
      TabIndex        =   2
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
      TabIndex        =   1
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
      TabIndex        =   0
      Top             =   480
      Width           =   3015
   End
   Begin CRVIEWERLibCtl.CRViewer CRViewer1 
      Height          =   7005
      Left            =   0
      TabIndex        =   3
      Top             =   0
      Width           =   7005
      DisplayGroupTree=   -1  'True
      DisplayToolbar  =   -1  'True
      EnableGroupTree =   -1  'True
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
End
Attribute VB_Name = "frmLaporanPenerimaanTindakanPoli"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Option Explicit
Dim ReportBaru As New crPenerimaanTindakanPoli
'Dim bolSuppresDetailSection10 As Boolean
'Dim ii As Integer
'Dim tempPrint1 As String
'Dim p As Printer
'Dim p2 As Printer
Dim strDeviceName As String
Dim strDriverName As String
Dim strPort As String

Private Sub cmdCetak_Click()
    ReportBaru.SelectPrinter "winspool", cboPrinter.Text, "Ne00:"
    'PrinterNama = cboPrinter.Text
    ReportBaru.PrintOut False
End Sub

Private Sub CmdOption_Click()
    ReportBaru.PrinterSetup Me.hwnd
    CRViewer1.Refresh
End Sub


Private Sub Form_Load()
    Dim p As Printer
    cboPrinter.Clear
    For Each p In Printers
        cboPrinter.AddItem p.DeviceName
    Next
    cboPrinter.Text = GetTxt("Setting.ini", "Printer", "LaporanPenerimaan")
End Sub

Private Sub Form_Resize()
    CRViewer1.Top = 0
    CRViewer1.Left = 0
    CRViewer1.Height = ScaleHeight
    CRViewer1.Width = ScaleWidth
End Sub

Private Sub Form_Unload(Cancel As Integer)

    Set frmLaporanPenerimaanTindakanPoli = Nothing
End Sub

Public Sub Cetak(idKasir As String, tglAwal As String, tglAkhir As String, idPegawai As String, idDept As String, view As String)
On Error GoTo errLoad
On Error Resume Next
Set frmLaporanPenerimaanTindakanPoli = Nothing
Dim adocmd As New ADODB.Command
    Dim str1 As String
    Dim str2 As String
    Dim str3 As String
    Dim str4 As String
    Dim nmaKasir As String
    Dim aingmacan As String
    Dim i As Integer
    If idPegawai <> "" Then
        str1 = " and pg.id in (" & idPegawai & ") "
    Else
        str1 = ""
    End If
    If idDept <> "" Then
        str4 = " and ru.objectdepartemenfk=" & idDept & " "
        str3 = " and objectdepartemenfk = " & idDept & " "
    End If
'    If idRuangan <> "" Then
'        str2 = " and apd.r=" & idRuangan & " "
'    End If
'    If idDokter <> "" Then
'        str3 = " and pg2.id=" & idDokter & " "
'    End If
    
Set ReportBaru = New crPenerimaanTindakanPoli
    
'    strSQL = " SELECT x.namaruangan,SUM(x.qty) AS qty,SUM(x.total) AS total FROM (SELECT namaruangan,0 AS qty,0 AS total FROM ruangan_m WHERE statusenabled = TRUE AND kdprofile = 21 " & str3
'    strSQL = strSQL & " UNION ALL " & _
'             " SELECT ru.namaruangan,COUNT(pp.produkfk) AS qty,(pp.jumlah*(pp.hargajual-pp.hargadiscount)) AS total " & _
'             " FROM pelayananpasien_t AS pp " & _
'             " INNER JOIN antrianpasiendiperiksa_t AS apd ON apd.norec = pp.noregistrasifk " & _
'             " LEFT JOIN ruangan_m AS ru ON ru.id = apd.objectruanganfk " & _
'             " INNER JOIN strukpelayanan_t AS sp ON sp.norec = pp.strukfk " & _
'             " INNER JOIN strukbuktipenerimaan_t AS sbm ON sbm.nostrukfk = sp.norec AND sbm.statusenabled = true  " & _
'             " LEFT JOIN loginuser_s AS lu ON lu.id = sbm.objectpegawaipenerimafk " & _
'             " LEFT JOIN pegawai_m AS pg ON pg.id = lu.objectpegawaifk " & _
'             " LEFT JOIN produk_m AS pr ON pr.id = pp.produkfk " & _
'             " WHERE pp.strukresepfk IS NULL AND sbm.tglsbm BETWEEN '" & tglAwal & "' and '" & tglAkhir & "' " & _
'             str1 & str4 & " AND pp.produkfk NOT IN (28343,30111,30110,30168,30650,31206,31207,32361,32362,33630,30151,33625,5001885) " & _
'             " GROUP BY ru.namaruangan,pp.produkfk,pp.jumlah,pp.hargajual,pp.hargadiscount"
    
     strSQL = " SELECT x.namaruangan,SUM(x.qty) AS qty,SUM(x.total) AS total FROM ( " & _
              " SELECT b.namaruangan,SUM(b.qty) AS qty,SUM(b.total) AS total " & _
              " FROM(SELECT ru.namaruangan,pp.jumlah AS qty,(pp.jumlah * (pp.hargajual - pp.hargadiscount)) AS total " & _
              " FROM pelayananpasien_t AS pp " & _
              " INNER JOIN antrianpasiendiperiksa_t AS apd ON apd.norec = pp.noregistrasifk " & _
              " INNER JOIN pasiendaftar_t AS pd ON pd.norec = apd.noregistrasifk " & _
              " LEFT JOIN ruangan_m AS ru ON ru. ID = apd.objectruanganfk " & _
              " INNER JOIN strukpelayanan_t AS sp ON sp.norec = pp.strukfk " & _
              " INNER JOIN strukbuktipenerimaan_t AS sbm ON sbm.nostrukfk = sp.norec " & _
              " AND sbm.statusenabled = TRUE " & _
              " LEFT JOIN loginuser_s AS lu ON lu. ID = sbm.objectpegawaipenerimafk " & _
              " LEFT JOIN pegawai_m AS pg ON pg. ID = lu.objectpegawaifk " & _
              " LEFT JOIN produk_m AS pr ON pr. ID = pp.produkfk " & _
              " WHERE pp.strukresepfk IS NULL AND sbm.tglsbm BETWEEN '" & tglAwal & "' and '" & tglAkhir & "' " & _
              " AND pd.objectkelompokpasienlastfk <> 2 AND pp.produkfk NOT IN (1002121482,28343,30111,30110,30168,30650,31206,31207,32361,32362,33630,30151,33625,5001885) " & _
              str1 & str4 & " ) AS b GROUP BY b.namaruangan"
                           
     strSQL = strSQL & " UNION ALL " & _
              " SELECT  'Farmasi' AS namaruangan,COUNT(xx.namapasien) AS qty,SUM(xx.total)" & _
              " FROM( SELECT pd.tglregistrasi,pm.nocm,pd.noregistrasi,pm.namapasien,ru.namaruangan,kp.kelompokpasien, " & _
              " SUM(((CASE WHEN pp.hargajual IS NULL THEN 0 ELSE pp.hargajual END - CASE WHEN pp.hargadiscount IS NULL THEN " & _
              " 0 ELSE pp.hargadiscount END) * pp.jumlah) + CASE WHEN pp.jasa IS NULL THEN 0 ELSE  pp.jasa END ) AS total, " & _
              " pd.tglpulang,sp.nostruk as nomorverif,sbm.nosbm,pg.namalengkap as kasir " & _
              " FROM pelayananpasien_t AS pp " & _
              " INNER JOIN antrianpasiendiperiksa_t AS apd ON apd.norec = pp.noregistrasifk " & _
              " INNER JOIN pasiendaftar_t AS pd ON pd.norec = apd.noregistrasifk " & _
              " INNER JOIN pasien_m AS pm ON pm.id = pd.nocmfk " & _
              " LEFT JOIN ruangan_m AS ru ON ru.id = apd.objectruanganfk " & _
              " INNER JOIN strukpelayanan_t AS sp ON sp.norec = pp.strukfk " & _
              " LEFT JOIN strukbuktipenerimaan_t AS sbm ON sbm.nostrukfk = sp.norec AND sbm.statusenabled = true " & _
              " LEFT JOIN loginuser_s AS lu ON lu.id = sbm.objectpegawaipenerimafk " & _
              " LEFT JOIN pegawai_m AS pg ON pg.id = lu.objectpegawaifk " & _
              " LEFT JOIN produk_m AS pr ON pr.id = pp.produkfk " & _
              " LEFT JOIN kelompokpasien_m AS kp ON kp.id = pd.objectkelompokpasienlastfk " & _
              " WHERE sbm.tglsbm BETWEEN '" & tglAwal & "' and '" & tglAkhir & "' AND pd.objectkelompokpasienlastfk <> 2 AND pp.strukresepfk IS NOT NULL " & _
              str1 & " GROUP BY pd.tglregistrasi,pm.nocm,pd.noregistrasi,pm.namapasien,ru.namaruangan,kp.kelompokpasien, " & _
              " pd.tglpulang,sp.nostruk,sbm.nosbm,pg.namalengkap ) AS xx "
              
     strSQL = strSQL & " UNION ALL " & _
              " SELECT 'Farmasi' AS namaruangan,COUNT(c.nosbm) as qty,SUM(c.total) AS total " & _
              " FROM(SELECT sbm.nosbm,sbm.totaldibayar AS total " & _
              " FROM strukresep_t AS sr " & _
              " INNER JOIN antrianpasiendiperiksa_t AS apd ON apd.norec = sr.pasienfk " & _
              " INNER JOIN pasiendaftar_t AS pd ON pd.norec = apd.noregistrasifk " & _
              " INNER JOIN pelayananpasien_t AS pp ON pp.strukresepfk = sr.norec " & _
              " INNER JOIN strukpelayanan_t AS sp ON sp.norec = pp.strukfk " & _
              " INNER JOIN strukbuktipenerimaan_t AS sbm ON sbm.nostrukfk = sp.norec " & _
              " AND sbm.statusenabled = TRUE " & _
              " LEFT JOIN loginuser_s AS lu ON lu. ID = sbm.objectpegawaipenerimafk " & _
              " LEFT JOIN pegawai_m AS pg ON pg. ID = lu.objectpegawaifk " & _
              " LEFT JOIN ruangan_m AS ru ON ru. ID = apd.objectruanganfk " & _
              " WHERE sbm.tglsbm BETWEEN '" & tglAwal & "' and '" & tglAkhir & "' AND pp.iskronis = true AND pd.objectkelompokpasienlastfk=2 " & _
              str1 & " GROUP BY sbm.nosbm,sbm.totaldibayar ) AS c "
              
     strSQL = strSQL & " UNION ALL " & _
              " SELECT 'Farmasi' AS namaruangan,COUNT(z.nostruk) AS qty,SUM(z.totaldibayar) AS total " & _
              " FROM(SELECT sp.nostruk,sbm.totaldibayar " & _
              " FROM strukpelayanan_t AS sp " & _
              " INNER JOIN strukbuktipenerimaan_t AS sbm ON sbm.nostrukfk = sp.norec AND sbm.statusenabled = true " & _
              " LEFT JOIN loginuser_s AS lu ON lu. ID = sbm.objectpegawaipenerimafk " & _
              " LEFT JOIN pegawai_m AS pg ON pg. ID = lu.objectpegawaifk " & _
              " WHERE SUBSTRING(sp.nostruk,1,2) = 'OB' AND sbm.tglsbm BETWEEN '" & tglAwal & "' and '" & tglAkhir & "' " & _
              str1 & _
              " ) AS z " & _
              " ) AS x " & _
              " GROUP BY x.namaruangan " & _
              " ORDER BY x.namaruangan ASC"
    ReadRs2 "select namalengkap from pegawai_m where id in (" & idPegawai & ")"
        If RS2.EOF = False Then
            For i = 0 To RS2.RecordCount - 1
                aingmacan = aingmacan & ", " & RS2!namalengkap
                RS2.MoveNext
            Next
        End If
        nmaKasir = Replace(aingmacan, ",", "", 1, 1)
    adocmd.CommandText = strSQL
    adocmd.CommandType = adCmdText
        
    With ReportBaru
        .database.AddADOCommand CN_String, adocmd
            .txtNamaRs.SetText strNamaLengkapRs
            .txtAlamatRs.SetText strAlamatRS & ", " & strKodePos & ", " & strNoTlpn & ", " & strNoFax
            .txtWebEmail.SetText strEmail & ", " & strWebSite
            .txtPeriode.SetText "Periode : " & tglAwal & " s/d " & tglAkhir & ""
            .usRuangan.SetUnboundFieldSource ("{ado.namaruangan}")
            .unJmlPendaftaranPasien.SetUnboundFieldSource IIf(IsNull("{ado.qty}") = True, "", ("{ado.qty}"))
            .unTotalBiaya.SetUnboundFieldSource IIf(IsNull("{ado.total}") = True, "", ("{ado.total}"))
            .txtNamaKasirs.SetText nmaKasir
            .usNamaKasir.SetText idKasir
'            .usN.SetText idKasir
            If view = "false" Then
                Dim strPrinter As String
                strPrinter = GetTxt("Setting.ini", "Printer", "LaporanPenerimaanKasir")
                .SelectPrinter "winspool", strPrinter, "Ne00:"
                .PrintOut False
                Unload Me
            Else
                With CRViewer1
                    .ReportSource = ReportBaru
                    .ViewReport
                    .Zoom 1
                End With
                Me.Show
            End If
        'End If
    End With
Exit Sub
errLoad:
End Sub

