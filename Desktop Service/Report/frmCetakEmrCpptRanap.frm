VERSION 5.00
Object = "{C4847593-972C-11D0-9567-00A0C9273C2A}#8.0#0"; "crviewer.dll"
Begin VB.Form frmCetakEmrCpptRanap 
   Caption         =   "Transmedic"
   ClientHeight    =   7005
   ClientLeft      =   60
   ClientTop       =   345
   ClientWidth     =   5820
   Icon            =   "frmCetakEmrCpptRanap.frx":0000
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
Attribute VB_Name = "frmCetakEmrCpptRanap"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Option Explicit
Dim Report As New crEmrCpptRanapFix

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
    cboPrinter.Text = GetTxt("Setting.ini", "Printer", "EMR-SuratPernyataanPenolakan")
End Sub

Private Sub Form_Resize()
    CRViewer1.Top = 0
    CRViewer1.Left = 0
    CRViewer1.Height = ScaleHeight
    CRViewer1.Width = ScaleWidth
End Sub

Private Sub Form_Unload(Cancel As Integer)

    Set frmCetakEmrCpptRanap = Nothing
End Sub

Sub GetSection(Report As crEmrCpptRanapFix, namasection As String, typedata As String, emrdfk As String, Optional Value As String = "")
    Dim arraySplit() As String
    
    If typedata = "combobox" Then
        arraySplit = Split(Value, "~")
        Report.Sections.Item(namasection).ReportObjects("txt" & emrdfk).SetText arraySplit(1)
    
    ElseIf typedata = "datetime" Then
        Report.Sections.Item(namasection).ReportObjects("txt" & emrdfk).SetText Format(Left(Value, 16), "dd-MM-yyyy hh:mm")
        
    ElseIf typedata = "textarea" Then
        Report.Sections.Item(namasection).ReportObjects("txt" & emrdfk).SetText Value
    
    Else
        Report.Sections.Item(namasection).ReportObjects("txt" & emrdfk).SetText Value
    End If
End Sub

Sub InitSectioncppt1(scppt1() As String)
    scppt1(0) = "Section73"
    scppt1(1) = "Section52"
    scppt1(2) = "Section102"
    scppt1(3) = "Section103"
    scppt1(4) = "Section104"
    scppt1(5) = "Section105"
    scppt1(6) = "Section106"
    scppt1(7) = "Section107"
    scppt1(8) = "Section108"
    scppt1(9) = "Section109"
    scppt1(10) = "Section110"
    scppt1(11) = "Section111"
    scppt1(12) = "Section112"
    scppt1(13) = "Section113"
    scppt1(14) = "Section114"
    scppt1(15) = "Section115"
    scppt1(16) = "Section124"
    scppt1(17) = "Section116"
    scppt1(18) = "Section117"
    scppt1(19) = "Section118"
    scppt1(20) = "Section119"
    scppt1(21) = "Section120"
    scppt1(22) = "Section121"
    scppt1(23) = "Section122"
End Sub

Sub InitSectioncppt2(scppt2() As String)
    scppt2(0) = "Section29"
    scppt2(1) = "Section30"
    scppt2(2) = "Section31"
    scppt2(3) = "Section32"
    scppt2(4) = "Section33"
    scppt2(5) = "Section34"
    scppt2(6) = "Section35"
    scppt2(7) = "Section36"
    scppt2(8) = "Section37"
    scppt2(9) = "Section38"
    scppt2(10) = "Section39"
    scppt2(11) = "Section40"
    scppt2(12) = "Section41"
    scppt2(13) = "Section42"
    scppt2(14) = "Section43"
    scppt2(15) = "Section44"
    scppt2(16) = "Section45"
    scppt2(17) = "Section46"
    scppt2(18) = "Section47"
    scppt2(19) = "Section48"
    scppt2(20) = "Section49"
    scppt2(21) = "Section50"
    scppt2(22) = "Section51"
    scppt2(23) = "Section53"
End Sub

Sub InitSectioncppt3(scppt3() As String)
    scppt3(0) = "Section54"
    scppt3(1) = "Section79"
    scppt3(2) = "Section80"
    scppt3(3) = "Section81"
    scppt3(4) = "Section82"
    scppt3(5) = "Section83"
    scppt3(6) = "Section84"
    scppt3(7) = "Section85"
    scppt3(8) = "Section86"
    scppt3(9) = "Section87"
    scppt3(10) = "Section88"
    scppt3(11) = "Section89"
    scppt3(12) = "Section90"
    scppt3(13) = "Section91"
    scppt3(14) = "Section92"
    scppt3(15) = "Section93"
    scppt3(16) = "Section94"
    scppt3(17) = "Section95"
    scppt3(18) = "Section96"
    scppt3(19) = "Section97"
    scppt3(20) = "Section98"
    scppt3(21) = "Section99"
    scppt3(22) = "Section100"
    scppt3(23) = "Section101"
End Sub

Sub InitSectioncppt4(scppt4() As String)
    scppt4(0) = "Section148"
    scppt4(1) = "Section149"
    scppt4(2) = "Section150"
    scppt4(3) = "Section151"
    scppt4(4) = "Section152"
    scppt4(5) = "Section153"
    scppt4(6) = "Section154"
    scppt4(7) = "Section155"
    scppt4(8) = "Section156"
    scppt4(9) = "Section157"
    scppt4(10) = "Section158"
    scppt4(11) = "Section159"
    scppt4(12) = "Section160"
    scppt4(13) = "Section161"
    scppt4(14) = "Section162"
    scppt4(15) = "Section163"
    scppt4(16) = "Section164"
    scppt4(17) = "Section165"
    scppt4(18) = "Section166"
    scppt4(19) = "Section167"
    scppt4(20) = "Section168"
    scppt4(21) = "Section169"
    scppt4(22) = "Section170"
    scppt4(23) = "Section171"
End Sub

Sub InitSectioncppt5(scppt5() As String)
    scppt5(0) = "Section196"
    scppt5(1) = "Section197"
    scppt5(2) = "Section198"
    scppt5(3) = "Section199"
    scppt5(4) = "Section200"
    scppt5(5) = "Section201"
    scppt5(6) = "Section202"
    scppt5(7) = "Section203"
    scppt5(8) = "Section204"
    scppt5(9) = "Section205"
    scppt5(10) = "Section206"
    scppt5(11) = "Section207"
    scppt5(12) = "Section208"
    scppt5(13) = "Section209"
    scppt5(14) = "Section210"
    scppt5(15) = "Section211"
    scppt5(16) = "Section212"
    scppt5(17) = "Section213"
    scppt5(18) = "Section214"
    scppt5(19) = "Section215"
    scppt5(20) = "Section216"
    scppt5(21) = "Section217"
    scppt5(22) = "Section218"
    scppt5(23) = "Section219"
End Sub

Sub InitSectioncppt6(scppt6() As String)
    scppt6(0) = "Section244"
    scppt6(1) = "Section245"
    scppt6(2) = "Section246"
    scppt6(3) = "Section247"
    scppt6(4) = "Section248"
    scppt6(5) = "Section249"
    scppt6(6) = "Section250"
    scppt6(7) = "Section251"
    scppt6(8) = "Section252"
    scppt6(9) = "Section253"
    scppt6(10) = "Section254"
    scppt6(11) = "Section255"
    scppt6(12) = "Section256"
    scppt6(13) = "Section257"
    scppt6(14) = "Section258"
    scppt6(15) = "Section259"
    scppt6(16) = "Section260"
    scppt6(17) = "Section261"
    scppt6(18) = "Section262"
    scppt6(19) = "Section263"
    scppt6(20) = "Section264"
    scppt6(21) = "Section265"
    scppt6(22) = "Section266"
    scppt6(23) = "Section267"
End Sub

Public Sub Cetak(nocm As String, norec_apd As String, emr As String, view As String)
'On Error GoTo errLoad
'On Error Resume Next

Set frmCetakEmrCpptRanap = Nothing
Dim adocmd As New ADODB.Command
Dim StrFilter, strFilter1 As String
Dim strSQL1 As String
Dim scppt1(23) As String
Dim scppt2(23) As String
Dim scppt3(23) As String
Dim scppt4(23) As String
Dim scppt5(23) As String
Dim scppt6(23) As String

Call InitSectioncppt1(scppt1)
Call InitSectioncppt2(scppt2)
Call InitSectioncppt3(scppt3)
Call InitSectioncppt4(scppt4)
Call InitSectioncppt5(scppt5)
Call InitSectioncppt6(scppt6)

Set Report = New crEmrCpptRanapFix
    strSQL = "select ps.nocm, ps.namapasien, to_char(ps.tgllahir,'dd-MM-yyyy') as tgllahir" & _
            ",CASE WHEN ps.objectjeniskelaminfk=1 then 'L' else 'P' END as jk" & _
            ",to_char(pd.tglregistrasi,'dd-MM-yyyy hh24:mi:ss') as tglregistrasi,rm.namaruangan" & _
            ",al.alamatlengkap, al.kecamatan,al.kotakabupaten" & _
            " from antrianpasiendiperiksa_t apd" & _
            " inner join pasiendaftar_t pd on pd.norec = apd.noregistrasifk" & _
            " inner join pasien_m ps on ps.id = pd.nocmfk" & _
            " inner join alamat_m as al on al.nocmfk=ps.id" & _
            " inner join ruangan_m as rm on rm.id = apd.objectruanganfk" & _
            " where apd.norec = '" & norec_apd & "'" & _
            " and ps.statusenabled = true and ps.nocm = '" & nocm & "'"

    strSQL2 = " SELECT emrp.nocm,emrdp.emrpasienfk ,emrdp.value ,emrdp.emrdfk," & _
                " emrd.caption,emrd.type, emrd.nourut,emrd.reportdisplay,  emrd.kodeexternal AS kodeex, " & _
                " emrd.satuan,emr.caption as namaform " & _
                " From emrpasiend_t As emrdp " & _
                " INNER JOIN emrpasien_t AS emrp ON emrp.noemr = emrdp.emrpasienfk " & _
                " INNER JOIN emrd_t AS emrd ON emrd.id = emrdp.emrdfk " & _
                " INNER JOIN emr_t AS emr ON emr.id = emrdp.emrfk " & _
                " Where emrdp.statusenabled = true" & _
                " AND emrp.nocm = '" & nocm & "' and emrp.norec='" & emr & "' " & _
                " AND emr.id in (443, 444, 445, 446, 447, 448) Order by emrdp.emrdfk ASC "
                


    ReadRs strSQL2
    
    adocmd.CommandText = strSQL
    adocmd.CommandType = adCmdText
        
    With Report
        .database.AddADOCommand CN_String, adocmd
        
        .txtNamaPemerintahan.SetText strNamaPemerintah
        .txtNamaRs.SetText strNamaLengkapRs
        .txtAlamatRs.SetText strAlamatRS
        .txtTelpFax.SetText strNoTlpn & ", " & strNoFax
        .txtWebEmail.SetText strEmail
        .usNoCm.SetUnboundFieldSource ("{Ado.nocm}")
        .usNamaPasien.SetUnboundFieldSource ("{Ado.namapasien}")
        .usJenisKelamin.SetUnboundFieldSource ("{Ado.jk}")
        .udTglLahir.SetUnboundFieldSource ("{Ado.tgllahir}")
        .usMasukRS.SetUnboundFieldSource ("{Ado.tglregistrasi}")
        .usRuangan.SetUnboundFieldSource ("{Ado.namaruangan}")
        
        If rs.RecordCount <> 0 Then
              Dim i As Integer
              Dim arraySplit() As String
              
              For i = 0 To rs.RecordCount - 1
              
                If Not IsNull(rs!Value) Then
                    'Tab 1 -----------------------------------------------------------------
                    'line 1
                    If rs!emrdfk >= 111348 And rs!emrdfk <= 111357 Then
                        Call GetSection(Report, scppt1(0), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 2
                    If rs!emrdfk >= 111358 And rs!emrdfk <= 111364 Then
                        Call GetSection(Report, scppt1(1), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    If rs!emrdfk >= 111395 And rs!emrdfk <= 111397 Then
                        Call GetSection(Report, scppt1(1), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 3
                    If rs!emrdfk >= 111368 And rs!emrdfk <= 111374 Then
                        Call GetSection(Report, scppt1(2), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    If rs!emrdfk >= 111435 And rs!emrdfk <= 111437 Then
                        Call GetSection(Report, scppt1(2), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 4
                    If rs!emrdfk >= 111378 And rs!emrdfk <= 111384 Then
                        Call GetSection(Report, scppt1(3), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    If rs!emrdfk >= 111480 And rs!emrdfk <= 111482 Then
                        Call GetSection(Report, scppt1(3), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 5
                    If rs!emrdfk >= 111388 And rs!emrdfk <= 111394 Then
                        Call GetSection(Report, scppt1(4), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    If rs!emrdfk >= 111520 And rs!emrdfk <= 111522 Then
                        Call GetSection(Report, scppt1(4), rs("type"), rs!emrdfk, rs!Value)
                    End If
    
                    'line 6
                    If rs!emrdfk >= 111398 And rs!emrdfk <= 111404 Then
                        Call GetSection(Report, scppt1(5), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    If rs!emrdfk >= 111560 And rs!emrdfk <= 111562 Then
                        Call GetSection(Report, scppt1(5), rs("type"), rs!emrdfk, rs!Value)
                    End If
    
                    'line 7
                    If rs!emrdfk >= 111408 And rs!emrdfk <= 111414 Then
                        Call GetSection(Report, scppt1(6), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    If rs!emrdfk >= 21040380 And rs!emrdfk <= 21040382 Then
                        Call GetSection(Report, scppt1(6), rs("type"), rs!emrdfk, rs!Value)
                    End If
    
                    'line 8
                    If rs!emrdfk >= 111418 And rs!emrdfk <= 111424 Then
                        Call GetSection(Report, scppt1(7), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    If rs!emrdfk >= 21040383 And rs!emrdfk <= 21040385 Then
                        Call GetSection(Report, scppt1(7), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 9
                    If rs!emrdfk >= 111428 And rs!emrdfk <= 111434 Then
                        Call GetSection(Report, scppt1(8), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    If rs!emrdfk >= 21040386 And rs!emrdfk <= 21040388 Then
                        Call GetSection(Report, scppt1(8), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 10
                    If rs!emrdfk >= 111438 And rs!emrdfk <= 111444 Then
                        Call GetSection(Report, scppt1(9), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    If rs!emrdfk >= 21040389 And rs!emrdfk <= 21040391 Then
                        Call GetSection(Report, scppt1(9), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 11
                    If rs!emrdfk >= 111448 And rs!emrdfk <= 111454 Then
                        Call GetSection(Report, scppt1(10), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    If rs!emrdfk >= 21040392 And rs!emrdfk <= 21040394 Then
                        Call GetSection(Report, scppt1(10), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 12
                    If rs!emrdfk >= 111458 And rs!emrdfk <= 111464 Then
                        Call GetSection(Report, scppt1(11), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    If rs!emrdfk >= 21040395 And rs!emrdfk <= 21040397 Then
                        Call GetSection(Report, scppt1(11), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 13
                    If rs!emrdfk >= 111473 And rs!emrdfk <= 111479 Then
                        Call GetSection(Report, scppt1(12), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    If rs!emrdfk >= 21040398 And rs!emrdfk <= 21040400 Then
                        Call GetSection(Report, scppt1(12), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 14
                    If rs!emrdfk >= 111483 And rs!emrdfk <= 111489 Then
                        Call GetSection(Report, scppt1(13), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    If rs!emrdfk >= 21040401 And rs!emrdfk <= 21040403 Then
                        Call GetSection(Report, scppt1(13), rs("type"), rs!emrdfk, rs!Value)
                    End If
    
                    'line 15
                    If rs!emrdfk >= 111493 And rs!emrdfk <= 111499 Then
                        Call GetSection(Report, scppt1(14), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    If rs!emrdfk >= 21040404 And rs!emrdfk <= 21040406 Then
                        Call GetSection(Report, scppt1(14), rs("type"), rs!emrdfk, rs!Value)
                    End If
    
                    'line 16
                    If rs!emrdfk >= 111503 And rs!emrdfk <= 111509 Then
                        Call GetSection(Report, scppt1(15), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    If rs!emrdfk >= 21040407 And rs!emrdfk <= 21040409 Then
                        Call GetSection(Report, scppt1(15), rs("type"), rs!emrdfk, rs!Value)
                    End If
    
                    'line 17
                    If rs!emrdfk >= 111513 And rs!emrdfk <= 111519 Then
                        Call GetSection(Report, scppt1(16), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    If rs!emrdfk >= 21040410 And rs!emrdfk <= 21040412 Then
                        Call GetSection(Report, scppt1(16), rs("type"), rs!emrdfk, rs!Value)
                    End If
    
                    'line 18
                    If rs!emrdfk >= 111523 And rs!emrdfk <= 111529 Then
                        Call GetSection(Report, scppt1(17), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    If rs!emrdfk >= 21040413 And rs!emrdfk <= 21040415 Then
                        Call GetSection(Report, scppt1(17), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 19
                    If rs!emrdfk >= 111533 And rs!emrdfk <= 111539 Then
                        Call GetSection(Report, scppt1(18), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    If rs!emrdfk >= 21040416 And rs!emrdfk <= 21040418 Then
                        Call GetSection(Report, scppt1(18), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 20
                    If rs!emrdfk >= 111543 And rs!emrdfk <= 111549 Then
                        Call GetSection(Report, scppt1(19), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    If rs!emrdfk >= 21040419 And rs!emrdfk <= 21040421 Then
                        Call GetSection(Report, scppt1(19), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 21
                    If rs!emrdfk >= 111553 And rs!emrdfk <= 111559 Then
                        Call GetSection(Report, scppt1(20), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    If rs!emrdfk >= 21040422 And rs!emrdfk <= 21040424 Then
                        Call GetSection(Report, scppt1(20), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 22
                    If rs!emrdfk >= 111563 And rs!emrdfk <= 111569 Then
                        Call GetSection(Report, scppt1(21), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    If rs!emrdfk >= 21040425 And rs!emrdfk <= 21040427 Then
                        Call GetSection(Report, scppt1(21), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 23
                    If rs!emrdfk >= 111573 And rs!emrdfk <= 111579 Then
                        Call GetSection(Report, scppt1(22), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    If rs!emrdfk >= 21040428 And rs!emrdfk <= 21040430 Then
                        Call GetSection(Report, scppt1(22), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 24
                    If rs!emrdfk >= 111583 And rs!emrdfk <= 111589 Then
                        Call GetSection(Report, scppt1(23), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    If rs!emrdfk >= 21040431 And rs!emrdfk <= 21040433 Then
                        Call GetSection(Report, scppt1(23), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'Tab 2 -----------------------------------------------------------------
                    'line 1
                    If rs!emrdfk >= 111593 And rs!emrdfk <= 111602 Then
                        Call GetSection(Report, scppt2(0), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 2
                    If rs!emrdfk >= 111603 And rs!emrdfk <= 111612 Then
                        Call GetSection(Report, scppt2(1), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 3
                    If rs!emrdfk >= 111613 And rs!emrdfk <= 111622 Then
                        Call GetSection(Report, scppt2(2), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 4
                    If rs!emrdfk >= 111623 And rs!emrdfk <= 111632 Then
                        Call GetSection(Report, scppt2(3), rs("type"), rs!emrdfk, rs!Value)
                    End If
    
                    'line 5
                    If rs!emrdfk >= 111633 And rs!emrdfk <= 111642 Then
                        Call GetSection(Report, scppt2(4), rs("type"), rs!emrdfk, rs!Value)
                    End If
    
                    'line 6
                    If rs!emrdfk >= 111643 And rs!emrdfk <= 111652 Then
                        Call GetSection(Report, scppt2(5), rs("type"), rs!emrdfk, rs!Value)
                    End If
    
                    'line 7
                    If rs!emrdfk >= 111653 And rs!emrdfk <= 111662 Then
                        Call GetSection(Report, scppt2(6), rs("type"), rs!emrdfk, rs!Value)
                    End If
    
                    'line 8
                    If rs!emrdfk >= 111663 And rs!emrdfk <= 111672 Then
                        Call GetSection(Report, scppt2(7), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 9
                    If rs!emrdfk >= 111673 And rs!emrdfk <= 111682 Then
                        Call GetSection(Report, scppt2(8), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 10
                    If rs!emrdfk >= 111683 And rs!emrdfk <= 111692 Then
                        Call GetSection(Report, scppt2(9), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 11
                    If rs!emrdfk >= 111693 And rs!emrdfk <= 111702 Then
                        Call GetSection(Report, scppt2(10), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 12
                    If rs!emrdfk >= 111703 And rs!emrdfk <= 111712 Then
                        Call GetSection(Report, scppt2(11), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 13
                    If rs!emrdfk >= 111717 And rs!emrdfk <= 111726 Then
                        Call GetSection(Report, scppt2(12), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 14
                    If rs!emrdfk >= 111727 And rs!emrdfk <= 111736 Then
                        Call GetSection(Report, scppt2(13), rs("type"), rs!emrdfk, rs!Value)
                    End If
    
                    'line 15
                    If rs!emrdfk >= 111737 And rs!emrdfk <= 111746 Then
                        Call GetSection(Report, scppt2(14), rs("type"), rs!emrdfk, rs!Value)
                    End If
    
                    'line 16
                    If rs!emrdfk >= 111747 And rs!emrdfk <= 111756 Then
                        Call GetSection(Report, scppt2(15), rs("type"), rs!emrdfk, rs!Value)
                    End If
    
                    'line 17
                    If rs!emrdfk >= 111757 And rs!emrdfk <= 111766 Then
                        Call GetSection(Report, scppt2(16), rs("type"), rs!emrdfk, rs!Value)
                    End If
    
                    'line 18
                    If rs!emrdfk >= 111767 And rs!emrdfk <= 111776 Then
                        Call GetSection(Report, scppt2(17), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 19
                    If rs!emrdfk >= 111777 And rs!emrdfk <= 111786 Then
                        Call GetSection(Report, scppt2(18), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 20
                    If rs!emrdfk >= 111787 And rs!emrdfk <= 111796 Then
                        Call GetSection(Report, scppt2(19), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 21
                    If rs!emrdfk >= 111797 And rs!emrdfk <= 111806 Then
                        Call GetSection(Report, scppt2(20), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 22
                    If rs!emrdfk >= 111807 And rs!emrdfk <= 111816 Then
                        Call GetSection(Report, scppt2(21), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 23
                    If rs!emrdfk >= 111817 And rs!emrdfk <= 111826 Then
                        Call GetSection(Report, scppt2(22), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 24
                    If rs!emrdfk >= 111827 And rs!emrdfk <= 111836 Then
                        Call GetSection(Report, scppt2(23), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'Tab 3 -----------------------------------------------------------------
                    'line 1
                    If rs!emrdfk >= 111837 And rs!emrdfk <= 111846 Then
                        Call GetSection(Report, scppt3(0), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 2
                    If rs!emrdfk >= 111847 And rs!emrdfk <= 111856 Then
                        Call GetSection(Report, scppt3(1), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 3
                    If rs!emrdfk >= 111857 And rs!emrdfk <= 111866 Then
                        Call GetSection(Report, scppt3(2), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 4
                    If rs!emrdfk >= 111867 And rs!emrdfk <= 111876 Then
                        Call GetSection(Report, scppt3(3), rs("type"), rs!emrdfk, rs!Value)
                    End If
    
                    'line 5
                    If rs!emrdfk >= 111877 And rs!emrdfk <= 111886 Then
                        Call GetSection(Report, scppt3(4), rs("type"), rs!emrdfk, rs!Value)
                    End If
    
                    'line 6
                    If rs!emrdfk >= 111887 And rs!emrdfk <= 111896 Then
                        Call GetSection(Report, scppt3(5), rs("type"), rs!emrdfk, rs!Value)
                    End If
    
                    'line 7
                    If rs!emrdfk >= 111897 And rs!emrdfk <= 111906 Then
                        Call GetSection(Report, scppt3(6), rs("type"), rs!emrdfk, rs!Value)
                    End If
    
                    'line 8
                    If rs!emrdfk >= 111907 And rs!emrdfk <= 111916 Then
                        Call GetSection(Report, scppt3(7), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 9
                    If rs!emrdfk >= 111917 And rs!emrdfk <= 111926 Then
                        Call GetSection(Report, scppt3(8), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 10
                    If rs!emrdfk >= 111927 And rs!emrdfk <= 111936 Then
                        Call GetSection(Report, scppt3(9), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 11
                    If rs!emrdfk >= 111937 And rs!emrdfk <= 111946 Then
                        Call GetSection(Report, scppt3(10), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 12
                    If rs!emrdfk >= 111947 And rs!emrdfk <= 111956 Then
                        Call GetSection(Report, scppt3(11), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 13
                    If rs!emrdfk >= 111961 And rs!emrdfk <= 111970 Then
                        Call GetSection(Report, scppt3(12), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 14
                    If rs!emrdfk >= 111971 And rs!emrdfk <= 111980 Then
                        Call GetSection(Report, scppt3(13), rs("type"), rs!emrdfk, rs!Value)
                    End If
    
                    'line 15
                    If rs!emrdfk >= 111981 And rs!emrdfk <= 111990 Then
                        Call GetSection(Report, scppt3(14), rs("type"), rs!emrdfk, rs!Value)
                    End If
    
                    'line 16
                    If rs!emrdfk >= 111991 And rs!emrdfk <= 112000 Then
                        Call GetSection(Report, scppt3(15), rs("type"), rs!emrdfk, rs!Value)
                    End If
    
                    'line 17
                    If rs!emrdfk >= 112001 And rs!emrdfk <= 112010 Then
                        Call GetSection(Report, scppt3(16), rs("type"), rs!emrdfk, rs!Value)
                    End If
    
                    'line 18
                    If rs!emrdfk >= 112011 And rs!emrdfk <= 112020 Then
                        Call GetSection(Report, scppt3(17), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 19
                    If rs!emrdfk >= 112021 And rs!emrdfk <= 112030 Then
                        Call GetSection(Report, scppt3(18), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 20
                    If rs!emrdfk >= 112031 And rs!emrdfk <= 112040 Then
                        Call GetSection(Report, scppt3(19), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 21
                    If rs!emrdfk >= 112041 And rs!emrdfk <= 112050 Then
                        Call GetSection(Report, scppt3(20), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 22
                    If rs!emrdfk >= 112051 And rs!emrdfk <= 112060 Then
                        Call GetSection(Report, scppt3(21), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 23
                    If rs!emrdfk >= 112061 And rs!emrdfk <= 112070 Then
                        Call GetSection(Report, scppt3(22), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 24
                    If rs!emrdfk >= 112071 And rs!emrdfk <= 112080 Then
                        Call GetSection(Report, scppt3(23), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'Tab 4 -----------------------------------------------------------------
                    'line 1
                    If rs!emrdfk >= 112081 And rs!emrdfk <= 112090 Then
                        Call GetSection(Report, scppt4(0), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 2
                    If rs!emrdfk >= 112091 And rs!emrdfk <= 112100 Then
                        Call GetSection(Report, scppt4(1), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 3
                    If rs!emrdfk >= 112101 And rs!emrdfk <= 112110 Then
                        Call GetSection(Report, scppt4(2), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 4
                    If rs!emrdfk >= 112111 And rs!emrdfk <= 112120 Then
                        Call GetSection(Report, scppt4(3), rs("type"), rs!emrdfk, rs!Value)
                    End If
    
                    'line 5
                    If rs!emrdfk >= 112121 And rs!emrdfk <= 112130 Then
                        Call GetSection(Report, scppt4(4), rs("type"), rs!emrdfk, rs!Value)
                    End If
    
                    'line 6
                    If rs!emrdfk >= 112131 And rs!emrdfk <= 112140 Then
                        Call GetSection(Report, scppt4(5), rs("type"), rs!emrdfk, rs!Value)
                    End If
    
                    'line 7
                    If rs!emrdfk >= 112141 And rs!emrdfk <= 112150 Then
                        Call GetSection(Report, scppt4(6), rs("type"), rs!emrdfk, rs!Value)
                    End If
    
                    'line 8
                    If rs!emrdfk >= 112151 And rs!emrdfk <= 112160 Then
                        Call GetSection(Report, scppt4(7), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 9
                    If rs!emrdfk >= 112161 And rs!emrdfk <= 112170 Then
                        Call GetSection(Report, scppt4(8), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 10
                    If rs!emrdfk >= 112171 And rs!emrdfk <= 112180 Then
                        Call GetSection(Report, scppt4(9), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 11
                    If rs!emrdfk >= 112181 And rs!emrdfk <= 112190 Then
                        Call GetSection(Report, scppt4(10), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 12
                    If rs!emrdfk >= 112191 And rs!emrdfk <= 112200 Then
                        Call GetSection(Report, scppt4(11), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 13
                    If rs!emrdfk >= 112205 And rs!emrdfk <= 112214 Then
                        Call GetSection(Report, scppt4(12), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 14
                    If rs!emrdfk >= 112215 And rs!emrdfk <= 112224 Then
                        Call GetSection(Report, scppt4(13), rs("type"), rs!emrdfk, rs!Value)
                    End If
    
                    'line 15
                    If rs!emrdfk >= 112225 And rs!emrdfk <= 112234 Then
                        Call GetSection(Report, scppt4(14), rs("type"), rs!emrdfk, rs!Value)
                    End If
    
                    'line 16
                    If rs!emrdfk >= 112235 And rs!emrdfk <= 112244 Then
                        Call GetSection(Report, scppt4(15), rs("type"), rs!emrdfk, rs!Value)
                    End If
    
                    'line 17
                    If rs!emrdfk >= 112245 And rs!emrdfk <= 112254 Then
                        Call GetSection(Report, scppt4(16), rs("type"), rs!emrdfk, rs!Value)
                    End If
    
                    'line 18
                    If rs!emrdfk >= 112255 And rs!emrdfk <= 112264 Then
                        Call GetSection(Report, scppt4(17), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 19
                    If rs!emrdfk >= 112265 And rs!emrdfk <= 112274 Then
                        Call GetSection(Report, scppt4(18), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 20
                    If rs!emrdfk >= 112275 And rs!emrdfk <= 112284 Then
                        Call GetSection(Report, scppt4(19), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 21
                    If rs!emrdfk >= 112285 And rs!emrdfk <= 112294 Then
                        Call GetSection(Report, scppt4(20), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 22
                    If rs!emrdfk >= 112295 And rs!emrdfk <= 112304 Then
                        Call GetSection(Report, scppt4(21), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 23
                    If rs!emrdfk >= 112305 And rs!emrdfk <= 112314 Then
                        Call GetSection(Report, scppt4(22), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 24
                    If rs!emrdfk >= 112315 And rs!emrdfk <= 112324 Then
                        Call GetSection(Report, scppt4(23), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'Tab 5 -----------------------------------------------------------------
                    'line 1
                    If rs!emrdfk >= 112325 And rs!emrdfk <= 112334 Then
                        Call GetSection(Report, scppt5(0), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 2
                    If rs!emrdfk >= 112335 And rs!emrdfk <= 112344 Then
                        Call GetSection(Report, scppt5(1), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 3
                    If rs!emrdfk >= 112345 And rs!emrdfk <= 112354 Then
                        Call GetSection(Report, scppt5(2), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 4
                    If rs!emrdfk >= 112355 And rs!emrdfk <= 112364 Then
                        Call GetSection(Report, scppt5(3), rs("type"), rs!emrdfk, rs!Value)
                    End If
    
                    'line 5
                    If rs!emrdfk >= 112365 And rs!emrdfk <= 112374 Then
                        Call GetSection(Report, scppt5(4), rs("type"), rs!emrdfk, rs!Value)
                    End If
    
                    'line 6
                    If rs!emrdfk >= 112375 And rs!emrdfk <= 112384 Then
                        Call GetSection(Report, scppt5(5), rs("type"), rs!emrdfk, rs!Value)
                    End If
    
                    'line 7
                    If rs!emrdfk >= 112385 And rs!emrdfk <= 112394 Then
                        Call GetSection(Report, scppt5(6), rs("type"), rs!emrdfk, rs!Value)
                    End If
    
                    'line 8
                    If rs!emrdfk >= 112395 And rs!emrdfk <= 112404 Then
                        Call GetSection(Report, scppt5(7), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 9
                    If rs!emrdfk >= 112405 And rs!emrdfk <= 112414 Then
                        Call GetSection(Report, scppt5(8), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 10
                    If rs!emrdfk >= 112415 And rs!emrdfk <= 112424 Then
                        Call GetSection(Report, scppt5(9), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 11
                    If rs!emrdfk >= 112425 And rs!emrdfk <= 112434 Then
                        Call GetSection(Report, scppt5(10), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 12
                    If rs!emrdfk >= 112435 And rs!emrdfk <= 112444 Then
                        Call GetSection(Report, scppt5(11), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 13
                    If rs!emrdfk >= 112449 And rs!emrdfk <= 112458 Then
                        Call GetSection(Report, scppt5(12), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 14
                    If rs!emrdfk >= 112459 And rs!emrdfk <= 112468 Then
                        Call GetSection(Report, scppt5(13), rs("type"), rs!emrdfk, rs!Value)
                    End If
    
                    'line 15
                    If rs!emrdfk >= 112469 And rs!emrdfk <= 112478 Then
                        Call GetSection(Report, scppt5(14), rs("type"), rs!emrdfk, rs!Value)
                    End If
    
                    'line 16
                    If rs!emrdfk >= 112479 And rs!emrdfk <= 112488 Then
                        Call GetSection(Report, scppt5(15), rs("type"), rs!emrdfk, rs!Value)
                    End If
    
                    'line 17
                    If rs!emrdfk >= 112489 And rs!emrdfk <= 112498 Then
                        Call GetSection(Report, scppt5(16), rs("type"), rs!emrdfk, rs!Value)
                    End If
    
                    'line 18
                    If rs!emrdfk >= 112499 And rs!emrdfk <= 112508 Then
                        Call GetSection(Report, scppt5(17), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 19
                    If rs!emrdfk >= 112509 And rs!emrdfk <= 112518 Then
                        Call GetSection(Report, scppt5(18), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 20
                    If rs!emrdfk >= 112519 And rs!emrdfk <= 112528 Then
                        Call GetSection(Report, scppt5(19), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 21
                    If rs!emrdfk >= 112529 And rs!emrdfk <= 112538 Then
                        Call GetSection(Report, scppt5(20), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 22
                    If rs!emrdfk >= 112539 And rs!emrdfk <= 112548 Then
                        Call GetSection(Report, scppt5(21), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 23
                    If rs!emrdfk >= 112549 And rs!emrdfk <= 112558 Then
                        Call GetSection(Report, scppt5(22), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 24
                    If rs!emrdfk >= 112559 And rs!emrdfk <= 112568 Then
                        Call GetSection(Report, scppt5(23), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'Tab 6 -----------------------------------------------------------------
                    'line 1
                    If rs!emrdfk >= 112569 And rs!emrdfk <= 112578 Then
                        Call GetSection(Report, scppt6(0), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 2
                    If rs!emrdfk >= 112579 And rs!emrdfk <= 112588 Then
                        Call GetSection(Report, scppt6(1), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 3
                    If rs!emrdfk >= 112589 And rs!emrdfk <= 112598 Then
                        Call GetSection(Report, scppt6(2), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 4
                    If rs!emrdfk >= 112599 And rs!emrdfk <= 112608 Then
                        Call GetSection(Report, scppt6(3), rs("type"), rs!emrdfk, rs!Value)
                    End If
    
                    'line 5
                    If rs!emrdfk >= 112609 And rs!emrdfk <= 112618 Then
                        Call GetSection(Report, scppt6(4), rs("type"), rs!emrdfk, rs!Value)
                    End If
    
                    'line 6
                    If rs!emrdfk >= 112619 And rs!emrdfk <= 112628 Then
                        Call GetSection(Report, scppt6(5), rs("type"), rs!emrdfk, rs!Value)
                    End If
    
                    'line 7
                    If rs!emrdfk >= 112629 And rs!emrdfk <= 112638 Then
                        Call GetSection(Report, scppt6(6), rs("type"), rs!emrdfk, rs!Value)
                    End If
    
                    'line 8
                    If rs!emrdfk >= 112639 And rs!emrdfk <= 112648 Then
                        Call GetSection(Report, scppt6(7), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 9
                    If rs!emrdfk >= 112649 And rs!emrdfk <= 112658 Then
                        Call GetSection(Report, scppt6(8), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 10
                    If rs!emrdfk >= 112659 And rs!emrdfk <= 112668 Then
                        Call GetSection(Report, scppt6(9), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 11
                    If rs!emrdfk >= 112669 And rs!emrdfk <= 112678 Then
                        Call GetSection(Report, scppt6(10), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 12
                    If rs!emrdfk >= 112679 And rs!emrdfk <= 112688 Then
                        Call GetSection(Report, scppt6(11), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 13
                    If rs!emrdfk >= 112693 And rs!emrdfk <= 112702 Then
                        Call GetSection(Report, scppt6(12), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 14
                    If rs!emrdfk >= 112703 And rs!emrdfk <= 112712 Then
                        Call GetSection(Report, scppt6(13), rs("type"), rs!emrdfk, rs!Value)
                    End If
    
                    'line 15
                    If rs!emrdfk >= 112713 And rs!emrdfk <= 112722 Then
                        Call GetSection(Report, scppt6(14), rs("type"), rs!emrdfk, rs!Value)
                    End If
    
                    'line 16
                    If rs!emrdfk >= 112723 And rs!emrdfk <= 112732 Then
                        Call GetSection(Report, scppt6(15), rs("type"), rs!emrdfk, rs!Value)
                    End If
    
                    'line 17
                    If rs!emrdfk >= 112733 And rs!emrdfk <= 112742 Then
                        Call GetSection(Report, scppt6(16), rs("type"), rs!emrdfk, rs!Value)
                    End If
    
                    'line 18
                    If rs!emrdfk >= 112743 And rs!emrdfk <= 112752 Then
                        Call GetSection(Report, scppt6(17), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 19
                    If rs!emrdfk >= 112753 And rs!emrdfk <= 112762 Then
                        Call GetSection(Report, scppt6(18), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 20
                    If rs!emrdfk >= 112763 And rs!emrdfk <= 112772 Then
                        Call GetSection(Report, scppt6(19), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 21
                    If rs!emrdfk >= 112773 And rs!emrdfk <= 112782 Then
                        Call GetSection(Report, scppt6(20), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 22
                    If rs!emrdfk >= 112783 And rs!emrdfk <= 112792 Then
                        Call GetSection(Report, scppt6(21), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 23
                    If rs!emrdfk >= 112793 And rs!emrdfk <= 112802 Then
                        Call GetSection(Report, scppt6(22), rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    'line 24
                    If rs!emrdfk >= 112803 And rs!emrdfk <= 112812 Then
                        Call GetSection(Report, scppt6(23), rs("type"), rs!emrdfk, rs!Value)
                    End If
                End If
                
                rs.MoveNext
              Next i
            
        End If
   
           If view = "false" Then
                Dim strPrinter As String
                
                strPrinter = GetTxt("Setting.ini", "Printer", "EMR-SuratPernyataanPenolakan")
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









