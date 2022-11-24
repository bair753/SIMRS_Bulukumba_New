VERSION 5.00
Object = "{C4847593-972C-11D0-9567-00A0C9273C2A}#8.0#0"; "crviewer.dll"
Begin VB.Form frmCetakEmrCpptNew 
   Caption         =   "Transmedic"
   ClientHeight    =   7005
   ClientLeft      =   60
   ClientTop       =   345
   ClientWidth     =   5820
   Icon            =   "frmCetakEmrCpptNew.frx":0000
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
Attribute VB_Name = "frmCetakEmrCpptNew"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Option Explicit
Dim Report As New crEmrCpptRajalNew

Dim strDeviceName As String
Dim strDriverName As String
Dim strPort As String

Dim mstream As ADODB.Stream
Dim fso As New FileSystemObject

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

    Set frmCetakEmrCpptNew = Nothing
End Sub

Sub GetSection(Report As crEmrCpptRajalNew, namasection As String, typedata As String, emrdfk As String, Optional Value As String = "")
    Dim arraySplit() As String
    ' Buat Folder
    HapusBuatFolder (False)
    If typedata = "combobox" Then
        arraySplit = Split(Value, "~")
        Report.Sections.Item(namasection).ReportObjects("txt" & emrdfk).SetText arraySplit(1)
        'If Right(emrdfk, 1) = "1" Then
'            Set mstream = New ADODB.Stream
'            ReadRs2 "select foto from fotottd_m where id=" + arraySplit(0)
'            If RS2.RecordCount > 0 Then
'            If IsNull(RS2.Fields("foto").Value) = False Then
'                ReadRs3 "select namalengkap, nosip from pegawai_m where id=" + arraySplit(0)
'                Report.Sections.Item(namasection).ReportObjects("sip" & namasection).SetText RS3!namalengkap & Chr(13) & Chr(13) & RS3!nosip
'                Set mstream = New ADODB.Stream
'                mstream.Type = adTypeBinary
'                mstream.Open
'                mstream.Write RS2.Fields("foto").Value
'                mstream.SavetoFile "c:\sign_temp\" & namasection & "_Format.jpg", adSaveCreateOverWrite
''            Set Report.Sections.Item(namasection).ReportObjects("pic" & emrdfk).FormattedPicture = LoadPicture("c:\tmp_epics.jpg")
''            Set pic111351.FormattedPicture = LoadPicture("c:\tmp_epics.jpg")
'            End If
'            End If
        'End If
    
    ElseIf typedata = "datetime" Then
        Report.Sections.Item(namasection).ReportObjects("txt" & emrdfk).SetText Format(Value, "dd-MM-yyyy hh:mm")
        'Report.Sections.Item(namasection).ReportObjects("txt" & emrdfk).SetText Format(Left(Value, 16), "dd-MM-yyyy hh:mm")
        
    ElseIf typedata = "textarea" Then
        Report.Sections.Item(namasection).ReportObjects("txt" & emrdfk).SetText Value
    
    Else
        Report.Sections.Item(namasection).ReportObjects("txt" & emrdfk).SetText Value
    End If
End Sub
Public Sub HapusBuatFolder(Status As Boolean)
    Select Case Status
        Case True
            If fso.FolderExists("c:\sign_temp") = True Then
                fso.DeleteFolder ("c:\sign_temp")
            End If
        Case False
            If fso.FolderExists("c:\sign_temp") = False Then
                fso.CreateFolder ("c:\sign_temp")
            End If
    End Select
End Sub

Public Sub Cetak(nocm As String, norec_apd As String, emr As String, view As String)
'On Error GoTo errLoad
'On Error Resume Next

Set frmCetakEmrCpptNew = Nothing
Dim adocmd As New ADODB.Command
Dim StrFilter, strFilter1 As String

' Hapus Folder TTD
'HapusBuatFolder (True)

Set Report = New crEmrCpptRajalNew

      
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

    strSQL2 = " SELECT emrp.nocm, to_char(emrp.tglemr,'dd-MM-yyyy hh24:mi:ss') as tglemr, jp.jenispegawai, emrdp.emrpasienfk ,case when  emrd.type = 'datetime' then to_char(emrdp.value::timestamptz, 'YYYY-MM-DD HH24:MI:SS') else emrdp.value end as value, emrdp.emrdfk," & _
                " emrd.caption,emrd.type, emrd.nourut,emrd.reportdisplay,  emrd.kodeexternal AS kodeex, " & _
                " pg.namalengkap, emrd.satuan,emr.caption as namaform  " & _
                " From emrpasiend_t As emrdp " & _
                " INNER JOIN emrpasien_t AS emrp ON emrp.noemr = emrdp.emrpasienfk " & _
                " INNER JOIN emrd_t AS emrd ON emrd.id = emrdp.emrdfk " & _
                " INNER JOIN emr_t AS emr ON emr.id = emrdp.emrfk " & _
                " INNER JOIN pegawai_m AS pg ON pg.id = emrp.pegawaifk " & _
                " INNER JOIN jenispegawai_m jp ON jp.id = pg.objectjenispegawaifk " & _
                " Where emrdp.statusenabled = true" & _
                " AND emrp.nocm = '" & nocm & "' and emrp.norec='" & emr & "' " & _
                " AND emr.id in (210222) Order by emrdp.emrdfk ASC "
                


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
                    'Tab 1
                    'line 1
                    '.txtTglEmr.SetText rs!tglemr
                    '.txtDPJP.SetText rs!namalengkap
                    If rs!emrdfk >= 22034961 And rs!emrdfk <= 22034968 Then
                        Call GetSection(Report, "Section1", rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    If rs!emrdfk >= 22034969 And rs!emrdfk <= 22034976 Then
                        Call GetSection(Report, "Section2", rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    If rs!emrdfk >= 22034977 And rs!emrdfk <= 22034984 Then
                        Call GetSection(Report, "Section3", rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    If rs!emrdfk >= 22034985 And rs!emrdfk <= 22034992 Then
                        Call GetSection(Report, "Section4", rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    If rs!emrdfk >= 22034993 And rs!emrdfk <= 22035000 Then
                        Call GetSection(Report, "Section5", rs("type"), rs!emrdfk, rs!Value)
                    End If
                    
                    If rs!emrdfk >= 22035001 And rs!emrdfk <= 22035008 Then
                        Call GetSection(Report, "Section9", rs("type"), rs!emrdfk, rs!Value)
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



