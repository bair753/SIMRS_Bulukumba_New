VERSION 5.00
Object = "{C4847593-972C-11D0-9567-00A0C9273C2A}#8.0#0"; "crviewer.dll"
Begin VB.Form frmCetakEmrKeteranganKelahiran 
   Caption         =   "Transmedic"
   ClientHeight    =   7005
   ClientLeft      =   60
   ClientTop       =   345
   ClientWidth     =   5820
   Icon            =   "frmCetakEmrKeteranganKelahiran.frx":0000
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
Attribute VB_Name = "frmCetakEmrKeteranganKelahiran"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Option Explicit
Dim Report As New crEmrKeteranganKelahiran

Dim strDeviceName As String
Dim strDriverName As String
Dim strPort As String

'Dim mstream As ADODB.Stream
'Dim fso As New FileSystemObject

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

    Set frmCetakEmrKeteranganKelahiran = Nothing
End Sub

'Public Sub HapusBuatFolder(status As Boolean)
'    Select Case status
'        Case True
'            If fso.FolderExists("c:\sign_temp") = True Then
'                fso.DeleteFolder ("c:\sign_temp")
'            End If
'        Case False
'            If fso.FolderExists("c:\sign_temp") = False Then
'                fso.CreateFolder ("c:\sign_temp")
'            End If
'    End Select
'End Sub

Public Sub Cetak(nocm As String, norecapd As String, emr As String, view As String)
'On Error GoTo errLoad
'On Error Resume Next

Set frmCetakEmrKeteranganKelahiran = Nothing
Dim adocmd As New ADODB.Command
Dim StrFilter, strFilter1 As String
Dim noreg As String

' Hapus Folder TTD
'HapusBuatFolder (True)

Set Report = New crEmrKeteranganKelahiran

    strSQL2 = " SELECT emrp.nocm,emrdp.emrpasienfk ,emrdp.value ,emrdp.emrdfk," & _
                " emrd.caption,emrd.type, emrd.nourut,emrd.reportdisplay,  emrd.kodeexternal AS kodeex, " & _
                " emrd.satuan,emr.caption as namaform, emrp.noregistrasifk " & _
                " From emrpasiend_t As emrdp " & _
                " INNER JOIN emrpasien_t AS emrp ON emrp.noemr = emrdp.emrpasienfk " & _
                " INNER JOIN emrd_t AS emrd ON emrd.id = emrdp.emrdfk " & _
                " INNER JOIN emr_t AS emr ON emr.id = emrdp.emrfk " & _
                " Where emrdp.statusenabled = true" & _
                " AND emrp.nocm = '" & nocm & "' and emrp.norec='" & emr & "' " & _
                " AND emr.id in (210246) Order by emrdp.emrdfk ASC "

    ReadRs strSQL2
    If rs.EOF = False Then
        noreg = rs!noregistrasifk
    End If
    
    strSQL = "select ps.nocm,ps.namapasien,to_char(ps.tgllahir,'dd - MM - yyyy') as tgllahir,CASE WHEN ps.objectjeniskelaminfk=1 then 'L' else 'P' END as jk, sm.suku, " & _
            " am.agama, EXTRACT(YEAR FROM AGE(pd.tglregistrasi, ps.tgllahir)) || ' Th ' as umur," & _
            " al.alamatlengkap || ', ' || al.kecamatan || ', ' || al.kotakabupaten as alamatlengkap," & _
            " rm.namaruangan, pd.tglregistrasi, pd.tglpulang, ps.nobpjs, km.namakelas,pm.nip, pm.namalengkap as dokterperiksa " & _
            " from pasien_m as ps  " & _
            " inner JOIN alamat_m as al on al.nocmfk=ps.id  " & _
            " left JOIN pasiendaftar_t pd ON pd.noregistrasi = RTRIM(LTRIM('" & noreg & "'))" & _
            " left JOIN ruangan_m as rm ON rm.id = pd.objectruanganlastfk " & _
            " left JOIN suku_m as sm ON sm.ID = ps.objectsukufk " & _
            " left JOIN agama_m as am on am.ID = ps.objectagamafk " & _
            " left join antrianpasiendiperiksa_t apd on apd.noregistrasifk = pd.norec and apd.objectruanganfk = pd.objectruanganlastfk " & _
            " left join kelas_m km on km.id = apd.objectkelasfk " & _
            " left join pegawai_m pm on pm.id = pd.objectdokterpemeriksafk " & _
            "where ps.statusenabled = true and ps.nocm = '" & nocm & "' "
    
    adocmd.CommandText = strSQL
    adocmd.CommandType = adCmdText
        
    With Report
        .database.AddADOCommand CN_String, adocmd
        
        .txtNamaPemerintahan.SetText strNamaPemerintah
        .txtNamaRs.SetText strNamaLengkapRs
        .txtAlamatRs.SetText strAlamatRS
'        .txtTelpFax.SetText strNoTlpn & ", " & strNoFax
'        .txtWebEmail.SetText strEmail
        
'        .usNamaPasien.SetUnboundFieldSource ("{Ado.namapasien}")
'        .usAlamat.SetUnboundFieldSource ("{Ado.alamatlengkap}")

        If rs.RecordCount <> 0 Then
              Dim i As Integer
              Dim arraySplit() As String
              
              For i = 0 To rs.RecordCount - 1
                
                If rs!emrdfk = 15247 Then
                
                ElseIf rs("type") = "checkbox" Then
                    If rs!Value = "1" Then
'                        If rs!emrdfk = 22040177 Then
'                            .Section8.ReportObjects("txtjeniskelaminanak").SetText "Laki - laki"
'                        ElseIf rs!emrdfk = 22040178 Then
'                            .Section8.ReportObjects("txtjeniskelaminanak").SetText "Perempuan"
'                        Else
                            .Section10.ReportObjects("txt" & rs!emrdfk).SetText "V"
'                        End If
                    End If
                        
                ElseIf rs("type") = "combobox" Then
                    arraySplit = Split(rs!Value, "~")
                    .Section10.ReportObjects("txt" & rs!emrdfk).SetText arraySplit(1)
                    If rs!emrdfk = 115224 Then
                        ReadRs2 "select nip from pegawai_m where id=" + arraySplit(0)
                        If RS2.RecordCount > 0 Then
                            .Section10.ReportObjects("nip" & rs!emrdfk).SetText IIf(IsNull(RS2!nip), "-", RS2!nip)
                        End If
                    End If
                    ' Nampilin tanda tangannya
'                    If rs!emrdfk = 22040181 Then
'                        ' Buat Folder
'                        HapusBuatFolder (False)
'                        Set mstream = New ADODB.Stream
'                        ReadRs2 "select foto from fotottd_m where id=" + arraySplit(0)
'                        If RS2.RecordCount > 0 Then
'                            If IsNull(RS2.Fields("foto").Value) = False Then
'                                ReadRs3 "select namalengkap, nosip from pegawai_m where id=" + arraySplit(0)
'                                .Section8.ReportObjects("sip" & rs!emrdfk).SetText IIf(IsNull(RS3!nosip), "-", RS3!nosip)
'                                Set mstream = New ADODB.Stream
'                                mstream.Type = adTypeBinary
'                                mstream.Open
'                                mstream.Write RS2.Fields("foto").Value
'                                mstream.SavetoFile "c:\sign_temp\pic" & rs!emrdfk & "_Format.jpg", adSaveCreateOverWrite
'                            End If
'                        End If
'                    End If
                
                ElseIf rs("type") = "datetime" Then
                    If rs!emrdfk = 115214 Then
                        Dim DOW As String
                        Select Case DatePart("w", rs!Value)
                            Case vbSunday
                                DOW = "Minggu"
                            Case vbMonday
                                DOW = "Senin"
                            Case vbTuesday
                                DOW = "Selasa"
                            Case vbWednesday
                                DOW = "Rabu"
                            Case vbThursday
                                DOW = "Kamis"
                            Case vbFriday
                                DOW = "Jumat"
                            Case vbSaturday
                                DOW = "Sabtu"
                        End Select
                        .Section10.ReportObjects("txt" & rs!emrdfk & "jam").SetText Format(Mid(rs!Value, 12, 8), "HH:mm")
                        .Section10.ReportObjects("txt" & rs!emrdfk & "hari").SetText DOW
                        .Section10.ReportObjects("txt" & rs!emrdfk & "tanggal").SetText Format(Left(rs!Value, 10), "dd")
                        .Section10.ReportObjects("txt" & rs!emrdfk & "bulan").SetText Format(Left(rs!Value, 10), "MM")
                        .Section10.ReportObjects("txt" & rs!emrdfk & "tahun").SetText Format(Left(rs!Value, 10), "yyyy")
                    Else
                        .Section10.ReportObjects("txt" & rs!emrdfk).SetText Format(Left(rs!Value, 10), "dd-MM-yyyy")
                    End If
                ElseIf rs("type") = "date" Then
                    .Section10.ReportObjects("txt" & rs!emrdfk).SetText Format(Left(rs!Value, 10), "dd - MMMM - yyyy")
                    
                ElseIf rs("type") = "time" Then
                    .Section10.ReportObjects("txt" & rs!emrdfk).SetText Format(Mid(rs!Value, 12, 8), "HH:mm:ss")
                
                ElseIf rs("type") = "textarea" Then
                    .Section10.ReportObjects("txt" & rs!emrdfk).SetText rs!Value
                
                ElseIf rs("type") = "checkboxtextbox" Then
                    .Section10.ReportObjects("txt" & rs!emrdfk & "1").SetText "V"
                    .Section10.ReportObjects("txt" & rs!emrdfk).SetText rs!Value
                
                Else
                    If rs!emrdfk = 115211 Then
                        .Section6.ReportObjects("txt" & rs!emrdfk).SetText rs!Value
                    Else
                        .Section10.ReportObjects("txt" & rs!emrdfk).SetText rs!Value
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









