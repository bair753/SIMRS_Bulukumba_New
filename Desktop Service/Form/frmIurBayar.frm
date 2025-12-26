VERSION 5.00
Object = "{C4847593-972C-11D0-9567-00A0C9273C2A}#8.0#0"; "crviewer.dll"
Begin VB.Form frmIurBayar 
   Caption         =   "Medifirst2000"
   ClientHeight    =   7005
   ClientLeft      =   60
   ClientTop       =   345
   ClientWidth     =   5820
   Icon            =   "frmIurBayar.frx":0000
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
Attribute VB_Name = "frmIurBayar"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Option Explicit
Dim Report As New crBuktiIurBayar
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

Public Sub Cetak(strNoStruk As String, strIdPegawai As String, view As String)
'On Error GoTo errLoad
'On Error Resume Next
Set frmSuratPerintahBayar = Nothing
Dim adocmd As New ADODB.Command
Dim StrFilter As String
Dim kamar As String
Dim kelas As String
Dim strSQL As String
StrFilter = ""

Set Report = New crBuktiIurBayar

        strSQL = " SELECT pm.nocm,pm.namapasien || ' (' || jk.reportdisplay || ') ' AS namapasien,to_char(pm.tgllahir,'DD/MM/YYYY') AS tgllahir, " & _
                 " pd.noregistrasi,to_char(pd.tglregistrasi,'DD/MM/YYYY') AS tglregistrasi,to_char(pd.tglpulang,'DD/MM/YYYY') AS tglpulang, " & _
                 " sp.nostruk,ru.namaruangan AS ruangrawat,dp.namadepartemen,kp.kelompokpasien,kls.namakelas, " & _
                 " kls1.namakelas AS kelasawal,kls2.namakelas AS kelastujuan,sppd.totaltagihankelasawal,sppd.totaltagihankelastujuan, " & _
                 " sppd.totalppenjamin,sppd.totalharusdibayar,sppd.totaltagihan " & _
                 " FROM strukpelayanan_t AS sp " & _
                 " INNER JOIN strukpelayananpenjamin_t AS spp ON spp.nostrukfk = sp.norec " & _
                 " INNER JOIN strukpelayananpenjamindetail_t AS sppd ON sppd.strukpelayananpenjaminfk = spp.norec " & _
                 " INNER JOIN pasiendaftar_t AS pd ON pd.norec = sp.noregistrasifk " & _
                 " INNER JOIN pasien_m AS pm ON pm.id = pd.nocmfk " & _
                 " LEFT JOIN ruangan_m AS ru on ru.id = pd.objectruanganlastfk " & _
                 " LEFT JOIN departemen_m AS dp ON dp.id = ru.objectdepartemenfk " & _
                 " LEFT JOIN kelompokpasien_m AS kp ON kp.id = pd.objectkelompokpasienlastfk " & _
                 " LEFT JOIN jeniskelamin_m AS jk ON jk.id = pm.objectjeniskelaminfk " & _
                 " LEFT JOIN kelas_m AS kls ON kls.id = pd.objectkelasfk " & _
                 " LEFT JOIN kelas_m AS kls1 ON kls1.id = sppd.kelasawalfk " & _
                 " LEFT JOIN kelas_m AS kls2 ON kls2.id = sppd.kelastujuanfk " & _
                 " WHERE sp.nostruk = '" & strNoStruk & "'"

    ReadRs5 strSQL
    adocmd.CommandText = strSQL
    adocmd.CommandType = adCmdText
        
    With Report
        .database.AddADOCommand CN_String, adocmd
            .txtNamaRs.SetText strNamaLengkapRs
            .txtAlamatRs.SetText strAlamatRS & ", " & strKodePos & ", " & strNoTlpn & ", " & strNoFax
            .txtNamaKota.SetText strNamaKota
            If RS5.EOF = False Then
                .txtNorm.SetText IIf(IsNull(RS5("nocm")), "-", RS5("nocm"))
                .txtNamaPasien.SetText IIf(IsNull(RS5("namapasien")), "-", RS5("namapasien"))
                .txtTglLahir.SetText IIf(IsNull(RS5("tgllahir")), "-", RS5("tgllahir"))
                .txtTglRegistrasi.SetText IIf(IsNull(RS5("tglregistrasi")), "-", RS5("tglregistrasi"))
                .txtInstalasi.SetText IIf(IsNull(RS5("namadepartemen")), "-", RS5("namadepartemen"))
                .txtRuangRawat.SetText IIf(IsNull(RS5("ruangrawat")), "-", RS5("ruangrawat"))
                .txtKelasRawat.SetText IIf(IsNull(RS5("namakelas")), "-", RS5("namakelas"))
                .txtNamaPetugas.SetText strIdPegawai
                .txtNamaUser.SetText strIdPegawai
                .txtKelasAwal.SetText IIf(IsNull(RS5("kelasawal")), "-", RS5("kelasawal"))
                .txtKelasTujuan.SetText IIf(IsNull(RS5("kelastujuan")), "-", RS5("kelastujuan"))
                .txtTotalTagihanKelasAwal.SetText IIf(IsNull(RS5("totaltagihankelasawal")), "-", "Rp. " & Format(RS5("totaltagihankelasawal"), "##,##0.00"))
                .txtTotalTagihanKelasAkhir.SetText IIf(IsNull(RS5("totaltagihankelastujuan")), "-", "Rp. " & Format(RS5("totaltagihankelastujuan"), "##,##0.00"))
                .txtSelisih.SetText IIf(IsNull(RS5("totalharusdibayar")), "-", "Rp. " & Format(RS5("totalharusdibayar"), "##,##0.00"))
                .txtIurPasien.SetText IIf(IsNull(RS5("totalharusdibayar")), "-", "Rp. " & Format(RS5("totalharusdibayar"), "##,##0.00"))
            End If
            If view = "false" Then
                Dim strPrinter As String
                strPrinter = GetTxt("Setting.ini", "Printer", "BuktiIurPasien")
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
