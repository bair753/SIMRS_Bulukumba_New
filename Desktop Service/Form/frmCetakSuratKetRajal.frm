VERSION 5.00
Object = "{C4847593-972C-11D0-9567-00A0C9273C2A}#8.0#0"; "crviewer.dll"
Begin VB.Form frmCetakSuratKetRajal 
   Caption         =   "Transmedic"
   ClientHeight    =   7005
   ClientLeft      =   60
   ClientTop       =   345
   ClientWidth     =   5820
   Icon            =   "frmCetakSuratKetRajal.frx":0000
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
Attribute VB_Name = "frmCetakSuratKetRajal"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Option Explicit
Dim Report As New crSuratKeteranganRajal
Dim strDeviceName As String
Dim strDriverName As String
Dim strPort As String
Dim adoReport As New ADODB.Command

Dim strPrinter As String
Dim strPrinter1 As String
Dim PrinterNama As String

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
    cboPrinter.Text = GetTxt("Setting.ini", "Printer", "LaporanPasienPulang")
End Sub

Private Sub Form_Resize()
    CRViewer1.Top = 0
    CRViewer1.Left = 0
    CRViewer1.Height = ScaleHeight
    CRViewer1.Width = ScaleWidth
End Sub

Private Sub Form_Unload(Cancel As Integer)
    Set frmCetakSuratKetRajal = Nothing
End Sub

Public Sub Cetak(strNoregistrasi As String, view As String)
'On Error GoTo errLoad
Dim adocmd As New ADODB.Command
Dim strSQL As String
Dim idPegawai As String
Dim Noregistrasi As String
Dim User As String
Set frmCetakSuratKetRajal = Nothing
Set Report = New crSuratKeteranganRajal
Dim petugasDaftar As String
Dim hari, jeniskelamin As String
If strNoregistrasi <> "" Then
    Noregistrasi = strNoregistrasi
Else
    Noregistrasi = ""
End If

    With Report
        
        Set adoReport = New ADODB.Command
        adoReport.ActiveConnection = CN_String
              
        strSQL = " SELECT pm.nocm as norm,pm.namapasien,pm.tgllahir,pd.tglregistrasi, " & _
                 " to_char(pm.tgllahir,'DD-MM-YYYY') as tglKelahiran,to_char(pd.tglregistrasi,'DD-MM-YYYY') as tglRegis, " & _
                 " jk.jeniskelamin,jk.reportdisplay as jklm,alm.alamatlengkap " & _
                 " FROM pasiendaftar_t as pd " & _
                 " INNER JOIN pasien_m as pm on pm.id = pd.nocmfk " & _
                 " LEFT JOIN jeniskelamin_m as jk on jk.id = pm.objectjeniskelaminfk " & _
                 " LEFT JOIN alamat_m as alm on alm.nocmfk = pm.id " & _
                 " LEFT JOIN penyebabkematian_m as pk on pk.id = pd.objectpenyebabkematianfk " & _
                 " LEFT JOIN pegawai_m AS pg ON pg.id = pd.objectdokterpemeriksafk " & _
                 " where pd.noregistrasi = '" & Noregistrasi & "'"

       ReadRs strSQL
        
        ReadRs2 " SELECT pg.namalengkap from pasiendaftar_t as pd " & _
                  " INNER JOIN logginguser_t as u on u.noreff = pd.norec " & _
                  " INNER JOIN loginuser_s as lu on lu.id = u.objectloginuserfk " & _
                  " INNER JOIN pegawai_m as pg on pg.id = lu.objectpegawaifk " & _
                  " where pd.noregistrasi = '" & Noregistrasi & "' "
'       ReadRs2 "select id,namalengkap,nippns from pegawai_m where id = '" & idPegawai & "' limit 1"
        If Not RS2.EOF Then
            petugasDaftar = RS2!namalengkap
        Else
            petugasDaftar = "-"
        End If
        
        adoReport.CommandText = strSQL
        adoReport.CommandType = adCmdUnknown
        .database.AddADOCommand CN_String, adoReport
        .txtNamaPemerintahan.SetText strNamaPemerintah
        .txtNamaRs.SetText strNamaLengkapRs
        .txtAlamatRs.SetText stralmtLengkapRs
'        .txtNamaKota.SetText strNamaKota & ", "
        If Not rs.EOF Then
'            If Not RS2 Then
'                .txtPetugas.SetText IIf(IsNull(RS2("namalengkap")), "-", RS2("namalengkap"))
'             Else
'            End If
'            hari = getHari(Format(rs!tglmeninggal, "yyyy/MM/dd"))
'            jeniskelamin = IIf(IsNull(rs("jeniskelamin")), "-", rs("jeniskelamin"))
'            If IsNull(rs!tgllahir) Then
''               .txtUmurJk.SetText "-"
'            Else
''               .txtUmurJk.SetText hitungUmurNew(Format(rs!tgllahir, "yyyy/MM/dd"), Format(rs!tglRegistrasi, "yyyy/MM/dd")) & " / " & jeniskelamin
'            End If
            .txtNamaPasien.SetText IIf(IsNull(rs("namapasien")), "-", rs("namapasien"))
            .txtalamat.SetText IIf(IsNull(rs("alamatlengkap")), "-", rs("alamatlengkap"))
            
'            .txtHari.SetText hari
'            .txtTanggal.SetText IIf(IsNull(rs("tglKematian")), "-", rs("tglKematian"))
'            .txtPukul.SetText IIf(IsNull(rs("jamKematian")), "-", rs("jamKematian"))
'            .txtNamaPetugas.SetText IIf(IsNull(rs("namalengkap")), "-", rs("namalengkap"))
            .txtJenisKelamin.SetText IIf(IsNull(rs("jeniskelamin")), "-", rs("jeniskelamin"))
            .txttglKelahiran.SetText IIf(IsNull(rs("tglKelahiran")), "-", rs("tglKelahiran"))
            .txtTglregis.SetText IIf(IsNull(rs("tglRegis")), "-", rs("tglRegis"))
            .txtNocm.SetText IIf(IsNull(rs("norm")), "-", rs("norm"))
            .txtPetugas.SetText petugasDaftar
        Else
'            .txtNamaPasien.SetText " "
'            .txtalamat.SetText " "
'            .txtPetugas.SetText " "
''            .txtHari.SetText " "
''            .txtTanggal.SetText " "
''            .txtPukul.SetText " "
''            .txtNamaPetugas.SetText " "
'            .txtJenisKelamin.SetText " "
'            .txttglKelahiran.SetText " "
'            .txtTglregis.SetText " "
        End If
        If view = "false" Then
            strPrinter1 = GetTxt("Setting.ini", "Printer", "SuratKeteranganMeninggal")
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
