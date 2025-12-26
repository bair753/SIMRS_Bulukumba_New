VERSION 5.00
Object = "{C4847593-972C-11D0-9567-00A0C9273C2A}#8.0#0"; "crviewer.dll"
Begin VB.Form frmNotaPengambilanDarah 
   Caption         =   "Transmedic"
   ClientHeight    =   7005
   ClientLeft      =   60
   ClientTop       =   345
   ClientWidth     =   5820
   ClipControls    =   0   'False
   Icon            =   "frmNotaPengambilanDarah.frx":0000
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
Attribute VB_Name = "frmNotaPengambilanDarah"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Option Explicit
Dim Report As New crNotaPengambilanDarah
Dim strDeviceName As String
Dim strDriverName As String
Dim strPort As String
Dim strPrinter As String
Dim strPrinter1 As String
Dim PrinterNama As String
Dim adoReport As New ADODB.Command

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
    cboPrinter.Text = GetTxt("Setting.ini", "Printer", "PasienDaftar")
End Sub

Private Sub Form_Resize()
    CRViewer1.Top = 0
    CRViewer1.Left = 0
    CRViewer1.Height = ScaleHeight
    CRViewer1.Width = ScaleWidth
End Sub

Private Sub Form_Unload(Cancel As Integer)
    Set frmNotaPengambilanDarah = Nothing
End Sub

Public Sub Cetak(strNorec As String, view As String)
'On Error GoTo errLoad
'On Error Resume Next
Set frmNotaPengambilanDarah = Nothing
Dim strSQL As String

    With Report
            strSQL = " SELECT pdr.*,pr.namaproduk,pg.namalengkap,pm.namapasien,pm.nocm,ru.namaruangan, " & _
                     " CASE WHEN pdr.produkfk IS NOT NULL THEN " & _
                     " pr.namaproduk || ' Jumlah ' || CAST (pdr.jumlah AS VARCHAR) || ' Colf' " & _
                     " ELSE gd.golongandarah || ' (' || jd.jenisdarah || ') Jumlah ' || CAST (pdr.jumlah AS VARCHAR) || ' Colf' END AS produk, " & _
                     " to_char(   pdr.tglambil,'DD/MM/YYYY HH24:MI:SS') AS tanggal " & _
                     " From pengambilandarah_t As pdr " & _
                     " LEFT JOIN pelayananpasien_t AS pp ON pp.norec = pdr.norec_pp " & _
                     " LEFT JOIN pasiendaftar_t AS pd ON pd.norec = pdr.norec_pd " & _
                     " LEFT JOIN pasien_m AS pm ON pm.id = pd.nocmfk " & _
                     " LEFT JOIN pegawai_m AS pg ON pg.id = pdr.pegawaifk " & _
                     " LEFT JOIN ruangan_m AS ru ON ru.id = pd.objectruanganlastfk " & _
                     " LEFT JOIN produk_m AS pr ON pr.id = pdr.produkfk " & _
                     " LEFT JOIN golongandarah_m AS gd ON gd.id = pdr.golongandarahfk " & _
                     " LEFT JOIN jenisdarah_m AS jd ON jd.id = pdr.jenisdarahfk " & _
                     " WHERE pdr.statusenabled = true AND pdr.norec = '" & strNorec & "' "
            
            ReadRs2 strSQL
            adoReport.CommandText = strSQL
            adoReport.CommandType = adCmdUnknown
            .database.AddADOCommand CN_String, adoReport
            If RS2.EOF = False Then
                .txtNamaRs.SetText strNamaLengkapRs
                .txtAlamatRs.SetText stralmtLengkapRs
                .txtNamaPemerintahan.SetText strNamaPemerintah
                .txtNorm.SetText IIf(IsNull(RS2("nocm")), "", RS2("nocm"))
                .txtNamaPasien.SetText IIf(IsNull(RS2("namapasien")), "", RS2("namapasien"))
                .txtBangsal.SetText IIf(IsNull(RS2("namaruangan")), "", RS2("namaruangan"))
                .txtGolonganDarah.SetText IIf(IsNull(RS2("produk")), "", RS2("produk"))
                .txtTglAmbil.SetText IIf(IsNull(RS2("tanggal")), "", RS2("tanggal"))
                .txtNamaPengambil.SetText IIf(IsNull(RS2("namapengambildarah")), "", RS2("namapengambildarah"))
                .txtNamaPetugas.SetText IIf(IsNull(RS2("namalengkap")), "", RS2("namalengkap"))
                .txtPetugasPmi.SetText IIf(IsNull(RS2("petugaspmi")), "", RS2("petugaspmi"))
            End If
            If view = "false" Then
                strPrinter1 = GetTxt("Setting.ini", "Printer", "NotaPengambilanDarah")
                .SelectPrinter "winspool", strPrinter1, "Ne00:"
                .PrintOut False
                Unload Me
                Screen.MousePointer = vbDefault
             Else
                With CRViewer1
                    .ReportSource = Report
                    .ViewReport
                    .Zoom 1
                End With
                Me.Show
                Screen.MousePointer = vbDefault
            End If
            
        
    End With
Exit Sub
errLoad:
End Sub
