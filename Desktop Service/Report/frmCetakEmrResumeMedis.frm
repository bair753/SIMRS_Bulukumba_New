VERSION 5.00
Object = "{C4847593-972C-11D0-9567-00A0C9273C2A}#8.0#0"; "crviewer.dll"
Begin VB.Form frmCetakEmrResumeMedis 
   Caption         =   "Transmedic"
   ClientHeight    =   7005
   ClientLeft      =   60
   ClientTop       =   345
   ClientWidth     =   5820
   Icon            =   "frmCetakEmrResumeMedis.frx":0000
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
Attribute VB_Name = "frmCetakEmrResumeMedis"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Option Explicit
Dim Report As New crEmrResumeMedis

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

    Set frmCetakEmrResumeMedis = Nothing
End Sub

Public Sub Cetak(nocm As String, norec As String, noregapd As String, view As String)
'On Error GoTo errLoad
'On Error Resume Next

Set frmCetakEmrResumeMedis = Nothing
Dim adocmd As New ADODB.Command
Dim StrFilter, strFilter1, strJoin, strWhere As String

Set Report = New crEmrResumeMedis

    strSQL = "select pm.namapasien, to_char(pm.tgllahir,'dd-MM-yyyy') as tgllahir,jm.jeniskelamin, rm.namaruangan ,to_char(pt.tglregistrasi,'dd-MM-yyyy') as tglregistrasi ,to_char(pt.tglpulang,'dd-MM-yyyy') as  tglpulang,pm2.namalengkap,rt.tindakanprosedur," & _
            "km.namakelas,rt.diagnosisawal ,rt.kddiagnosisawal ,rt.diagnosismasuk ,rt.kddiagnosismasuk ,rt.diagnosistambahan ,rt.kddiagnosistambahan ," & _
            "rt.kddiagnosistambahan2 ,rt.kddiagnosistambahan3 ,rt.kddiagnosistambahan4, dm.kddiagnosa as kddiagnosa1, dm.namadiagnosa AS namadiagnosa1," & _
            "dm2.kddiagnosa as kddiagnosa2, dm2.namadiagnosa AS namadiagnosa2, dm3.kddiagnosa as kddiagnosa3,  dm3.namadiagnosa AS namadiagnosa3," & _
            "dm4.kddiagnosa as kddiagnosa4, dm4.namadiagnosa AS namadiagnosa4, dm5.kddiagnosa as kddiagnosa5, dm5.namadiagnosa AS namadiagnosa5, " & _
            "dm6.kddiagnosa as kddiagnosa6, dm6.namadiagnosa AS namadiagnosa6," & _
            "rt.alasandirawat, rt.ringkasanriwayatpenyakit,rt.pemeriksaanfisik, rt.terapi, rt.hasilkonsultasi,rt.kondisiwaktukeluar, rt.instruksianjuran," & _
            "rt.pengobatandilanjutkan,rt.tglkontrolpoli,rt.rumahsakittujuan,rt2.namaobat, rt2.jumlah, rt2.dosis, rt2.frekuensi, rt2.carapemberian " & _
            "from resumemedis_t rt " & _
            "left join resumemedisdetail_t rt2 on rt2.resumefk = rt.norec " & _
            "inner join antrianpasiendiperiksa_t at2 on at2.norec = rt.noregistrasifk " & _
            "inner join pasiendaftar_t pt on pt.norec = at2.noregistrasifk " & _
            "inner join pasien_m pm on pm.id = pt.nocmfk " & _
            "inner join jeniskelamin_m jm on pm.objectjeniskelaminfk = jm.id " & _
            "inner join ruangan_m rm on rm.id = at2.objectruanganfk " & _
            "inner join kelas_m km on km.id = at2.objectkelasfk " & _
            "inner join pegawai_m pm2 on pm2.id = pt.objectpegawaifk " & _
            "left join diagnosa_m dm on dm.id = rt.kddiagnosismasuk " & _
            "left join diagnosa_m dm2 on dm2.id = rt.kddiagnosisawal " & _
            "left join diagnosa_m dm3 on dm3.id = rt.kddiagnosistambahan " & _
            "left join diagnosa_m dm4 on dm4.id = rt.kddiagnosistambahan2 " & _
            "left join diagnosa_m dm5 on dm5.id = rt.kddiagnosistambahan3 " & _
            "left join diagnosa_m dm6 on dm6.id = rt.kddiagnosistambahan4 " & _
            "where rt.statusenabled = true and rt.keteranganlainnya = 'RawatInap' and pm.nocm = '" & nocm & "' and rt.norec = '" & norec & "'"
    
    
    ReadRs strSQL
    
    adocmd.CommandText = strSQL
    adocmd.CommandType = adCmdText
        
    With Report
        .database.AddADOCommand CN_String, adocmd
        
        .txtNamaPemerintahan.SetText strNamaPemerintah
        .txtNamaRs.SetText strNamaLengkapRs
        .txtAlamatRs.SetText strAlamatRS
        .txtTelpFax.SetText strNoTlpn & ", " & strNoFax
        .txtWebEmail.SetText strEmail
        .usNamaPasien.SetUnboundFieldSource ("{Ado.namapasien}")
        .usJenisKelamin.SetUnboundFieldSource ("{Ado.jeniskelamin}")
        .udTglLahir.SetUnboundFieldSource ("{Ado.tgllahir}")
        .usRuang.SetUnboundFieldSource ("{Ado.namaruangan}")
        .usKelasRawat.SetUnboundFieldSource ("{Ado.namakelas}")
        .usTanggalMasuk.SetUnboundFieldSource ("{Ado.tglregistrasi}")
        .usTanggalKeluar.SetUnboundFieldSource ("{Ado.tglpulang}")
        .usDPJP.SetUnboundFieldSource ("{Ado.namalengkap}")

        .usDiagnosaMasuk.SetUnboundFieldSource ("{Ado.namadiagnosa1}")
        .usKdDiagnosaMasuk.SetUnboundFieldSource ("{Ado.kddiagnosa1}")
        .usDiagnosaUtama.SetUnboundFieldSource ("{Ado.namadiagnosa2}")
        .usKdDiagnosaUtama.SetUnboundFieldSource ("{Ado.kddiagnosa2}")
        .usDiagnosaTambahan1.SetUnboundFieldSource ("{Ado.namadiagnosa3}")
        .usKdDiagnosaTambahan1.SetUnboundFieldSource ("{Ado.kddiagnosa3}")
        .usDiagnosaTambahan2.SetUnboundFieldSource ("{Ado.namadiagnosa4}")
        .usKdDiagnosaTambahan2.SetUnboundFieldSource ("{Ado.kddiagnosa4}")
        .usDiagnosaTambahan3.SetUnboundFieldSource ("{Ado.namadiagnosa5}")
        .usKdDiagnosaTambahan3.SetUnboundFieldSource ("{Ado.kddiagnosa5}")
        .usDiagnosaTambahan4.SetUnboundFieldSource ("{Ado.namadiagnosa6}")
        .usKdDiagnosaTambahan4.SetUnboundFieldSource ("{Ado.kddiagnosa6}")
        .usAlasanDirawat.SetUnboundFieldSource ("{Ado.alasandirawat}")
        .usRiwayatPenyakitSekarang.SetUnboundFieldSource ("{Ado.ringkasanriwayatpenyakit}")
         Select Case rs!pemeriksaanfisik
            Case "Loboratorium"
                .Section8.ReportObjects("txtlab").SetText "V"
            Case "Rotgen"
               .Section8.ReportObjects("txtrontgen").SetText "V"
            Case "CT Scan/MRI/USG"
               .Section8.ReportObjects("txtctscan").SetText "V"
         End Select
        .usTerapiPasien.SetUnboundFieldSource ("{Ado.terapi}")
        .usHasilKonsul.SetUnboundFieldSource ("{Ado.hasilkonsultasi}")
        Select Case rs!kondisiwaktukeluar
            Case "Sembuh"
                .Section8.ReportObjects("txtsembuh").SetText "V"
            Case "Belum Sembuh"
               .Section8.ReportObjects("txtbsembuh").SetText "V"
            Case "Pulang atas Permintaan Sendiri"
               .Section8.ReportObjects("txtpulang").SetText "V"
            Case "Membaik"
               .Section8.ReportObjects("txtmembaik").SetText "V"
            Case "Meninggal"
               .Section8.ReportObjects("txtmeninggal").SetText "V"
            Case "Pindah RS Lain"
               .Section8.ReportObjects("txtpindah").SetText "V"
         End Select
        .usTindakLanjut.SetUnboundFieldSource ("{Ado.tindakanprosedur}")
        Select Case rs!pengobatandilanjutkan
            Case "Poliklinik"
                .Section8.ReportObjects("txtpoli").SetText "V"
            Case "RS Lain"
               .Section8.ReportObjects("txtrs").SetText "V"
            Case "Puskesmas"
               .Section8.ReportObjects("txtpuskesmas").SetText "V"
            Case "Dokter Luar"
               .Section8.ReportObjects("txtdokterluar").SetText "V"
            Case Else
               .Section8.ReportObjects("txtlain").SetText "V"
               .usPLLainnya.SetUnboundFieldSource ("{Ado.pengobatandilanjutkan}")
         End Select
         .usTglPoli.SetUnboundFieldSource ("{Ado.tglkontrolpoli}")
         .usIGDRS.SetUnboundFieldSource ("{Ado.rumahsakittujuan}")
         .usNamaobat.SetUnboundFieldSource ("{Ado.namaobat}")
         .usJumlah.SetUnboundFieldSource ("{Ado.jumlah}")
         .usDosis.SetUnboundFieldSource ("{Ado.dosis}")
         .usFrekuensi.SetUnboundFieldSource ("{Ado.frekuensi}")
         .usCarapemberian.SetUnboundFieldSource ("{Ado.carapemberian}")
         .Section11.ReportObjects("txttanggalsekarang").SetText Format(Now, "dd-MM-yyyy")
         .Section11.ReportObjects("txtjamsekarang").SetText Format(Now, "hh:mm:ss")
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









