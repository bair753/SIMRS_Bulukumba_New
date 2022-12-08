VERSION 5.00
Object = "{C4847593-972C-11D0-9567-00A0C9273C2A}#8.0#0"; "crviewer.dll"
Begin VB.Form frmSuratPerintahBayar 
   Caption         =   "Transmedic"
   ClientHeight    =   7005
   ClientLeft      =   60
   ClientTop       =   345
   ClientWidth     =   5820
   Icon            =   "frmSuratPerintahBayar.frx":0000
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
Attribute VB_Name = "frmSuratPerintahBayar"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Option Explicit
Dim Report As New crSuratPerintahBayar
'Dim bolSuppresDetailSection10 As Boolean
'Dim ii As Integer
'Dim tempPrint1 As String
'Dim p As Printer
'Dim p2 As Printer
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
    cboPrinter.Text = GetTxt("Setting.ini", "Printer", "RincianBiayaPelayanan")
End Sub

Private Sub Form_Resize()
    CRViewer1.Top = 0
    CRViewer1.Left = 0
    CRViewer1.Height = ScaleHeight
    CRViewer1.Width = ScaleWidth
End Sub

Private Sub Form_Unload(Cancel As Integer)
    Set frmSuratPerintahBayar = Nothing
End Sub

Public Sub Cetak(strNoStruk As String, jenisLayanan As String, strIdPegawai As String, view As String)
'On Error GoTo errLoad
'On Error Resume Next
Set frmSuratPerintahBayar = Nothing
Dim adocmd As New ADODB.Command
Dim StrFilter As String
Dim kamar As String
Dim kelas As String
Dim strSQL As String
StrFilter = ""

Set Report = New crSuratPerintahBayar
    If jenisLayanan = "LAYANAN" Then
        strSQL = " SELECT x.nocm,x.nostruk,x.ruangrawat,x.namadepartemen,x.tglregistrasi,x.tgllahir,x.namapasien,x.kelompokpasien,x.namakelas,x.namaproduk,SUM(x.jumlah) AS jumlah,SUM(x.total) AS total,'-' AS depo  " & _
                    " FROM(SELECT pm.nocm,sp.nostruk,ru.namaruangan AS ruangrawat,dp.namadepartemen,to_char(pd.tglregistrasi,'DD-MM-YYYY') AS tglregistrasi,to_char(pm.tgllahir,'DD-MM-YYYY') AS tgllahir,pm.namapasien || ' (' || jk.reportdisplay || ') ' AS namapasien,kp.kelompokpasien,kls.namakelas,CASE WHEN pp.isobat = true THEN 'Pelayanan Obat/Alkes Farmasi' ELSE " & _
                    " 'Pelayanan Tindakan ' || dp1.namadepartemen END AS namaproduk,pp.jumlah,sum(((case when pp.hargajual is null then 0 else pp.hargajual end - case when pp.hargadiscount is null then 0 else pp.hargadiscount end) * pp.jumlah) + case when pp.jasa is null then 0 else pp.jasa end) as total " & _
                    " FROM strukpelayanan_t AS sp " & _
                    " INNER JOIN pelayananpasien_t AS pp ON pp.strukfk = sp.norec " & _
                    " INNER JOIN antrianpasiendiperiksa_t AS apd ON apd.norec = pp.noregistrasifk " & _
                    " INNER JOIN pasiendaftar_t AS pd ON pd.norec = apd.noregistrasifk " & _
                    " INNER JOIN pasien_m AS pm ON pm.id = pd.nocmfk " & _
                    " LEFT JOIN produk_m AS pr ON pr.id = pp.produkfk " & _
                    " LEFT JOIN ruangan_m AS ru on ru.id = pd.objectruanganlastfk " & _
                    " LEFT JOIN ruangan_m AS ru1 on ru1.id = apd.objectruanganfk " & _
                    " LEFT JOIN departemen_m AS dp ON dp.id = ru.objectdepartemenfk " & _
                    " LEFT JOIN departemen_m AS dp1 ON dp1.id = ru1.objectdepartemenfk " & _
                    " LEFT JOIN kelompokpasien_m AS kp ON kp.id = pd.objectkelompokpasienlastfk " & _
                    " LEFT JOIN jeniskelamin_m AS jk ON jk.id = pm.objectjeniskelaminfk " & _
                    " LEFT JOIN kelas_m AS kls ON kls.id = pd.objectkelasfk " & _
                    " WHERE sp.nostruk = '" & strNoStruk & "' " & _
                    " GROUP BY pm.nocm,ru1.namaruangan,pr.namaproduk,pp.isobat,dp1.namadepartemen,pp.jumlah, " & _
                    " sp.nostruk,ru.namaruangan,dp.namadepartemen,pd.tglregistrasi, " & _
                    " pm.tgllahir,pm.namapasien,jk.reportdisplay,kp.kelompokpasien,kls.namakelas) AS x " & _
                    " GROUP BY x.nocm,x.nostruk,x.ruangrawat,x.namadepartemen,x.tglregistrasi,x.tgllahir, " & _
                    " x.namapasien,x.kelompokpasien,x.namakelas,x.namaproduk "
        ReadRs5 strSQL
    ElseIf jenisLayanan = "RESEP" Then
                
        strSQL = " SELECT x.nocm,x.nostruk,x.ruangrawat,x.namadepartemen,x.tglregistrasi,x.tgllahir,x.namapasien, " & _
                 " x.kelompokpasien,x.namakelas,x.namaproduk,SUM (x.jumlah) AS jumlah,SUM (x.total) AS total,x.depo " & _
                 " FROM ( SELECT   pm.nocm,sp.noresep AS nostruk,ru.namaruangan AS ruangrawat,dp.namadepartemen, " & _
                 " to_char(pd.tglregistrasi,'DD-MM-YYYY') AS tglregistrasi,to_char(pm.tgllahir, 'DD-MM-YYYY') AS tgllahir, " & _
                 " pm.namapasien || ' (' || jk.reportdisplay || ') ' AS namapasien,kp.kelompokpasien,kls.namakelas,pr.namaproduk,pp.jumlah, " & _
                 " SUM (((CASE WHEN pp.hargajual IS NULL THEN 0   ELSE pp.hargajual END - CASE WHEN pp.hargadiscount IS NULL THEN 0 ELSE pp.hargadiscount END) * pp.jumlah) + CASE " & _
                 " WHEN pp.jasa IS NULL THEN 0 ELSE pp.jasa END) AS total,ru2.namaruangan AS depo " & _
                 " FROM pelayananpasien_t AS pp INNER JOIN strukresep_t AS sp ON sp.norec = pp.strukresepfk " & _
                 " INNER JOIN antrianpasiendiperiksa_t AS apd ON apd.norec = pp.noregistrasifk INNER JOIN pasiendaftar_t AS pd ON pd.norec = apd.noregistrasifk " & _
                 " INNER JOIN pasien_m AS pm ON pm.id = pd.nocmfk LEFT JOIN produk_m AS pr ON pr.id = pp.produkfk " & _
                 " LEFT JOIN ruangan_m AS ru ON ru.id = pd.objectruanganlastfk LEFT JOIN ruangan_m AS ru1 ON ru1.id = apd.objectruanganfk " & _
                 " LEFT JOIN departemen_m AS dp ON dp.id = ru.objectdepartemenfk LEFT JOIN departemen_m AS dp1 ON dp1.id = ru1.objectdepartemenfk LEFT JOIN kelompokpasien_m AS kp ON kp.id = pd.objectkelompokpasienlastfk " & _
                 " LEFT JOIN jeniskelamin_m AS jk ON jk.id = pm.objectjeniskelaminfk LEFT JOIN kelas_m AS kls ON kls.id = pd.objectkelasfk " & _
                 " LEFT JOIN ruangan_m AS ru2 ON ru2.id = sp.ruanganfk Where pp.strukresepfk = '" & strNoStruk & "' " & _
                 " GROUP BY pm.nocm,ru1.namaruangan,pr.namaproduk,pp.isobat,dp1.namadepartemen,pp.jumlah,sp.noresep,ru.namaruangan,dp.namadepartemen,pd.tglregistrasi,pm.tgllahir, " & _
                 " pm.namapasien,jk.reportdisplay,kp.kelompokpasien,kls.namakelas,ru2.namaruangan) AS x " & _
                 " GROUP BY x.nocm,x.nostruk,x.ruangrawat,x.namadepartemen,x.tglregistrasi,x.tgllahir,x.namapasien,x.KelompokPasien,x.namakelas,x.namaproduk,x.depo "
        ReadRs5 strSQL
    
    Else
        strSQL = " SELECT x.nocm,x.nostruk,'-' AS ruangrawat,'-' AS namadepartemen,x.tglregistrasi,x.tgllahir,x.namapasien,'Umum/Pribadi' AS kelompokpasien,'NON KELAS' AS namakelas,x.namaproduk,SUM(x.jumlah) AS jumlah,SUM(x.total) AS total,x.depo " & _
                 " FROM(SELECT CAST(sp.nostruk_intern AS VARCHAR) AS nocm,sp.nostruk,to_char(sp.tglstruk,'DD-MM-YYYY') AS tglregistrasi,to_char(sp.tglfaktur,'DD-MM-YYYY') AS tgllahir,sp.namapasien_klien AS namapasien, " & _
                 " CASE WHEN substring(sp.nostruk,1,2)='OB' THEN 'Pelayanan Obat/Alkes Farmasi' ELSE pr.namaproduk END AS namaproduk,CAST(spd.qtyproduk AS FLOAT) AS jumlah,sum(((case when spd.hargasatuan is null then 0 else spd.hargasatuan end -  " & _
                 " case when spd.hargadiscount is null then 0 else spd.hargadiscount end) * spd.qtyproduk) + case when spd.hargatambahan is null then 0 else spd.hargatambahan end) * CASE WHEN spd.qtyoranglast IS NULL THEN 1 Else spd.qtyoranglast end AS total,CASE WHEN substring(sp.nostruk,1,2)='OB' THEN ru.namaruangan ELSE '-' END AS depo " & _
                 " FROM strukpelayanan_t AS sp " & _
                 " INNER JOIN strukpelayanandetail_t AS spd ON spd.nostrukfk = sp.norec " & _
                 " LEFT JOIN produk_m AS pr ON pr.id = spd.objectprodukfk " & _
                 " LEFT JOIN ruangan_m AS ru ON ru.id= sp.objectruanganfk " & _
                 " WHERE sp.norec = '" & strNoStruk & "' " & _
                 " GROUP BY sp.nostruk_intern,sp.tglstruk,sp.tglfaktur,sp.namapasien_klien,sp.nostruk,pr.namaproduk,spd.qtyproduk,spd.qtyoranglast,ru.namaruangan) AS x " & _
                 " GROUP BY x.nocm,x.nostruk,x.tglregistrasi,x.tgllahir,x.namapasien,x.namaproduk,x.depo "
        ReadRs5 strSQL
    End If
            
    adocmd.CommandText = strSQL
    adocmd.CommandType = adCmdText
        
    With Report
        .database.AddADOCommand CN_String, adocmd
            .txtNamaRs.SetText strNamaLengkapRs
            .txtAlamatRs.SetText strAlamatRS & ", " & strKodePos & ", " & strNoTlpn & ", " & strNoFax
            .txtNamaKota.SetText strNamaKota
            If RS5.EOF = False Then
                .txtNoTagihan.SetText IIf(IsNull(RS5("nostruk")), "-", RS5("nostruk"))
                .txtNorm.SetText IIf(IsNull(RS5("nocm")), "-", RS5("nocm"))
                .txtNamaPasien.SetText IIf(IsNull(RS5("namapasien")), "-", RS5("namapasien"))
                .txtTglLahir.SetText IIf(IsNull(RS5("tgllahir")), "-", RS5("tgllahir"))
                .txtTglRegistrasi.SetText IIf(IsNull(RS5("tglregistrasi")), "-", RS5("tglregistrasi"))
                .txtInstalasi.SetText IIf(IsNull(RS5("namadepartemen")), "-", RS5("namadepartemen"))
                .txtRuangRawat.SetText IIf(IsNull(RS5("ruangrawat")), "-", RS5("ruangrawat"))
                .txtKelasRawat.SetText IIf(IsNull(RS5("namakelas")), "-", RS5("namakelas"))
                .txtNamaPetugas.SetText strIdPegawai
                .txtNamaUser.SetText strIdPegawai
                .txtNamaDepo.SetText IIf(IsNull(RS5("depo")), "-", RS5("depo"))
            End If
            .usLayanan.SetUnboundFieldSource ("{ado.namaproduk}")
            .unQty.SetUnboundFieldSource ("{ado.jumlah}")
            .ucTotal.SetUnboundFieldSource ("{ado.total}")
            If view = "false" Then
                Dim strPrinter As String
                strPrinter = GetTxt("Setting.ini", "Printer", "SuratPerintahMembayar")
                .SelectPrinter "winspool", strPrinter, "Ne00:"
                .PrintOut False
                Unload Me
            Else
                With CRViewer1
                    .ReportSource = Report
                    .ViewReport
                    .Zoom 1
                End With
                Me.Show
            End If
    End With
Exit Sub
errLoad:
End Sub
