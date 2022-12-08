VERSION 5.00
Object = "{C4847593-972C-11D0-9567-00A0C9273C2A}#8.0#0"; "crviewer.dll"
Begin VB.Form frmSuratDokter 
   Caption         =   "Transmedic"
   ClientHeight    =   7005
   ClientLeft      =   60
   ClientTop       =   345
   ClientWidth     =   5820
   Icon            =   "frmSuratDokter.frx":0000
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
Attribute VB_Name = "frmSuratDokter"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Option Explicit
Dim Report As New crCetakSks
Dim ReportSIS As New crCetakSuratIjinSakit
Dim ReportSkbn As New crCetakSkbn
Dim ReportSkbw As New crCetakSkbw
Dim ReportLahir As New crCetakSuratLahir
Dim ii As Integer
Dim tempPrint1 As String
Dim p As Printer
Dim p2 As Printer
Dim strDeviceName As String
Dim strDriverName As String
Dim strPrinter As String
Dim strPrinter1 As String
Dim PrinterNama As String
Dim strPort As String
Dim bolSKD As Boolean
Dim bolSIS As Boolean
Dim bolSkbn As Boolean
Dim bolSkbw As Boolean
Dim bolLahir As Boolean
Dim adoReport As New ADODB.Command

Private Sub cmdCetak_Click()
    If cboPrinter.Text = "" Then MsgBox "Printer belum dipilih", vbInformation, ".: Information": Exit Sub
    If bolSKD = True Then
        Report.SelectPrinter "winspool", cboPrinter.Text, "Ne00:"
        PrinterNama = cboPrinter.Text
        Report.PrintOut False
    ElseIf bolSIS = True Then
        ReportSIS.SelectPrinter "winspool", cboPrinter.Text, "Ne00:"
        PrinterNama = cboPrinter.Text
        ReportSIS.PrintOut False
    ElseIf bolSkbn = True Then
        ReportSkbn.SelectPrinter "winspool", cboPrinter.Text, "Ne00:"
        PrinterNama = cboPrinter.Text
        ReportSkbn.PrintOut False
    ElseIf bolSkbw = True Then
        ReportSkbw.SelectPrinter "winspool", cboPrinter.Text, "Ne00:"
        PrinterNama = cboPrinter.Text
        ReportSkbw.PrintOut False
    ElseIf bolLahir = True Then
        ReportLahir.SelectPrinter "winspool", cboPrinter.Text, "Ne00:"
        PrinterNama = cboPrinter.Text
        ReportLahir.PrintOut False
    End If
End Sub

Private Sub CmdOption_Click()
    If bolSKD = True Then
        Report.PrinterSetup Me.hwnd
    ElseIf bolSIS = True Then
        ReportSIS.PrinterSetup Me.hwnd
    ElseIf bolSkbn = True Then
        ReportSkbn.PrinterSetup Me.hwnd
    ElseIf bolSkbw = True Then
        ReportSkbn.PrinterSetup Me.hwnd
    ElseIf bolLahir = True Then
        ReportLahir.PrinterSetup Me.hwnd
    End If
    
    CRViewer1.Refresh
End Sub

Private Sub Form_Load()
    Dim p As Printer
    cboPrinter.Clear
    For Each p In Printers
        cboPrinter.AddItem p.DeviceName
    Next
    strPrinter = strPrinter1
    cboPrinter.Text = GetSetting("SMART", "SettingPrinter", "cboPrinter")
End Sub

Private Sub Form_Resize()
    CRViewer1.Top = 0
    CRViewer1.Left = 0
    CRViewer1.Height = ScaleHeight
    CRViewer1.Width = ScaleWidth
End Sub

Private Sub Form_Unload(Cancel As Integer)
    Set frmSuratDokter = Nothing
End Sub

Public Sub CetakSuratDokter(strNorec As String, strIdPegawai As String, view As String)
'On Error GoTo errLoad
bolSKD = True
bolSIS = False
bolSkbn = False
bolSkbw = False
bolLahir = False
Set frmSuratDokter = Nothing
Set Report = New crCetakSks

    ReadRs " SELECT sk.*,pm.nocm,pd.noregistrasi,pm.namapasien,pm.tgllahir,to_char(pm.tgllahir, 'DD-MM-YYYY') AS tglkelahiran,pd.tglregistrasi," & _
           " pm.tempatlahir,jk.jeniskelamin,alm.alamatlengkap,CASE WHEN pk.pekerjaan IS NULL THEN '' ELSE pk.pekerjaan END AS pekerjaan," & _
           " to_char(sk.tglsurat, 'DD-MM-YYYY HH:mm') AS tglpemeriksaan,to_char(sk.tglsurat, 'DD-MM-YYYY') AS tglperiksa,to_char(sk.tglsurat, 'HH24:mm') AS jamperiksa" & _
           " FROM suratketerangan_t AS sk" & _
           " INNER JOIN pasiendaftar_t AS pd ON pd.norec = sk.pasiendaftarfk" & _
           " INNER JOIN pasien_m AS pm ON pm. ID = pd.nocmfk" & _
           " LEFT JOIN alamat_m AS alm ON alm.nocmfk = pm. ID" & _
           " LEFT JOIN jeniskelamin_m AS jk ON jk. ID = pm.objectjeniskelaminfk" & _
           " LEFT JOIN pekerjaan_m AS pk ON pk. ID = pm.objectpekerjaanfk" & _
           " WHERE sk.norec = '" & strNorec & "' LIMIT 1"
    
'   ReadRs strSQL
    With Report
        If Not rs.EOF Then
            .txtNamaPemerintahan.SetText strNamaPemerintah
            .txtNamaRs.SetText strNamaLengkapRs
            .txtAlamatRs.SetText stralmtLengkapRs
            .txtWeb.SetText strEmail & ", " & strWebSite
            .txtKota.SetText strNamaKota & ", "
            .txtNamaPasien.SetText rs!namapasien
            .txtAlamatPasien.SetText rs!alamatlengkap
            .txtPekerjaan.SetText rs!pekerjaan
            .txtUmur.SetText UCase(IIf(IsNull(rs("tglkelahiran")), "-", rs("tglkelahiran"))) & " / " & " (" & hitungUmur(Format(rs!tgllahir, "yyyy/MM/dd"), Format(rs!tglRegistrasi, "yyyy/MM/dd")) & ")"
            .txtTglPeriksa.SetText IIf(IsNull(rs("tglpemeriksaan")), "-", rs("tglpemeriksaan"))
            .txtCatatan.SetText IIf(IsNull(rs("kesimpulan")), "-", rs("kesimpulan"))
            .txtKeterangan.SetText IIf(IsNull(rs("keterangan")), "-", rs("keterangan"))
            .txtKeperluan.SetText IIf(IsNull(rs("keperluansurat")), "-", rs("keperluansurat"))
            .txtBeratBadan.SetText IIf(IsNull(rs("beratbadan")), "-", rs("beratbadan"))
            .txtTinggiBadan.SetText IIf(IsNull(rs("tinggibadan")), "-", rs("tinggibadan"))
'            .txtNoUrut.SetText nosurat
        
            If view = "false" Then
                Dim strPrinter As String
                strPrinter = GetTxt("Setting.ini", "Printer", "SuratKeterangan")
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

Public Sub CetakSuratKeteranganSakit(strNorec As String, strIdPegawai As String, view As String)
'On Error GoTo errLoad
bolSKD = True
bolSIS = False
bolSkbn = False
bolSkbw = False
bolLahir = False
Set frmSuratDokter = Nothing
Set frmCRCetakPasienPerjanjian = Nothing
Set ReportSIS = New crCetakSuratIjinSakit

    ReadRs " SELECT sk.nosurat,sk.norec,pm.nocm,pd.noregistrasi,pm.namapasien,to_char(pm.tgllahir, 'DD-MM-YYYY') as tgllahir,pm.tempatlahir, " & _
             " jk.jeniskelamin,alm.alamatlengkap,sk.lamaistrahat,to_char(sk.tglawal, 'DD-MM-YYYY') AS tglawal, " & _
             " to_char(sk.tglakhir, 'DD-MM-YYYY') AS tglakhir,pg.namalengkap, " & _
             " 'NIP. ' || CASE WHEN pg.nippns IS NULL THEN '' ELSE pg.nippns END AS nip, " & _
             " CASE WHEN pk.pekerjaan IS NULL THEN '' ELSE pk.pekerjaan END AS pekerjaan " & _
             " FROM suratketerangan_t as sk " & _
             " INNER JOIN pasiendaftar_t as pd on pd.norec = sk.pasiendaftarfk " & _
             " INNER JOIN pasien_m as pm on pm.id = pd.nocmfk " & _
             " INNER JOIN alamat_m as alm on alm.nocmfk = pm.id " & _
             " INNER JOIN pegawai_m as pg on pg.id = sk.dokterfk " & _
             " INNER JOIN jeniskelamin_m as jk on jk.id = pm.objectjeniskelaminfk " & _
             " LEFT JOIN pekerjaan_m as pk on pk.id = pm.objectpekerjaanfk " & _
             " WHERE sk.norec = '" & strNorec & "'"
    
'    ReadRs strSQL
    Dim Laki As String
    Dim Cewe As String
    Dim keluhan1, keluhan2, keluhan3, keluhan4, keluhan5, keluhan6, nosurat As String
    If Not rs.EOF Then
       Laki = ""
       Cewe = ""
       If rs!jeniskelamin = "LAKI-LAKI" Then
        Laki = "V"
       ElseIf rs!jeniskelamin = "PEREMPUAN" Then
        Cewe = "V"
       End If
       nosurat = Mid(rs!nosurat, 3, 3)
    End If
    
    With ReportSIS
        If Not rs.EOF Then
            .txtNamaPemerintahan.SetText strNamaPemerintah
            .txtNamaRs.SetText strNamaLengkapRs
            .txtAlamatRs.SetText stralmtLengkapRs
            .txtWeb.SetText strEmail & ", " & strWebSite
            .txtKota.SetText strNamaKota & ", "
            .txtNamaPasien.SetText rs!namapasien
            .txtAlamatPasien.SetText rs!alamatlengkap
            .txtNamaDokter.SetText rs!namalengkap
            .txtPekerjaan.SetText rs!pekerjaan
            .txtNip.SetText rs!nip
            .txtTanggalLahir.SetText rs!tgllahir
            .txtPria.SetText Laki
            .TxtCewe.SetText Cewe
            .txtLamaIjin.SetText rs!lamaistrahat
            .txtTglAwal.SetText rs!tglAwal
            .txtTglAkhir.SetText rs!tglAkhir
            .txtNoUrut.SetText nosurat
            .txtTempatLahir.SetText rs!tempatlahir
            
            If view = "false" Then
                Dim strPrinter As String
                strPrinter = GetTxt("Setting.ini", "Printer", "SuratKeterangan")
                ReportSIS.SelectPrinter "winspool", strPrinter, "Ne00:"
                ReportSIS.PrintOut False
                Unload Me
            Else
                With CRViewer1
                    .ReportSource = ReportSIS
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

Public Sub CetakSkbn(strNorec As String, strIdPegawai As String, view As String)
'On Error GoTo errLoad
bolSKD = False
bolSIS = False
bolSkbn = True
bolSkbw = False
bolLahir = False
Set frmSuratDokter = Nothing
Set frmCRCetakPasienPerjanjian = Nothing
Set ReportSkbn = New crCetakSkbn

    ReadRs " SELECT sk.*,pm.nocm,pd.noregistrasi,pm.namapasien,to_char(pm.tgllahir, 'DD-MM-YYYY') AS tgllahir," & _
           " pm.tempatlahir,jk.jeniskelamin,alm.alamatlengkap,CASE WHEN pk.pekerjaan IS NULL THEN '' ELSE pk.pekerjaan END AS pekerjaan," & _
           " CASE WHEN sk.ismorphine = true THEN 'Positif' WHEN sk.ismorphine = false THEN 'Negatif'  ELSE 'tidak diperiksa' END AS morphine," & _
           " CASE WHEN sk.isamphetamine = true THEN 'Positif' WHEN sk.isamphetamine = false THEN 'Negatif'  ELSE 'tidak diperiksa' END AS amphetamine," & _
           " CASE WHEN sk.ismariyuana = true THEN 'Positif' WHEN sk.ismariyuana = false THEN 'Negatif'  ELSE 'tidak diperiksa' END AS mariyuana," & _
           " CASE WHEN sk.ismetamphetemaine = true THEN 'Positif' WHEN sk.ismetamphetemaine = false THEN 'Negatif'  ELSE 'tidak diperiksa' END AS metamphetemaine," & _
           " CASE WHEN sk.iscocaine = true THEN 'Positif' WHEN sk.iscocaine = false THEN 'Negatif'  ELSE 'tidak diperiksa' END AS cocaine," & _
           " CASE WHEN sk.isbenzodizepin = true THEN 'Positif' WHEN sk.isbenzodizepin = false THEN 'Negatif'  ELSE 'tidak diperiksa' END AS benzodizepin," & _
           " to_char(sk.tglsurat, 'DD-MM-YYYY') AS tglperiksa,to_char(sk.tglsurat, 'HH:mm') AS jamperiksa" & _
           " FROM suratketerangan_t AS sk" & _
           " INNER JOIN pasiendaftar_t AS pd ON pd.norec = sk.pasiendaftarfk" & _
           " INNER JOIN pasien_m AS pm ON pm. ID = pd.nocmfk" & _
           " LEFT JOIN alamat_m AS alm ON alm.nocmfk = pm. ID" & _
           " LEFT JOIN jeniskelamin_m AS jk ON jk. ID = pm.objectjeniskelaminfk" & _
           " LEFT JOIN pekerjaan_m AS pk ON pk. ID = pm.objectpekerjaanfk" & _
           " WHERE sk.norec = '" & strNorec & "' LIMIT 1"
    
'    ReadRs strSQL
    
    With ReportSkbn
        If Not rs.EOF Then
            .txtNamaPemerintahan.SetText strNamaPemerintah
            .txtNamaRs.SetText strNamaLengkapRs
            .txtAlamatRs.SetText stralmtLengkapRs
            .txtWeb.SetText strEmail & ", " & strWebSite
            .txtKota.SetText strNamaKota & ", "
            .txtNamaPasien.SetText IIf(IsNull(rs("namapasien")), "-", rs("namapasien"))
            .txtAlamatPasien.SetText IIf(IsNull(rs("alamatlengkap")), "-", rs("alamatlengkap"))
            .txtJenisKelamin.SetText IIf(IsNull(rs("jeniskelamin")), "-", rs("jeniskelamin"))
            .txtTanggalLahir.SetText IIf(IsNull(rs("tgllahir")), "-", rs("tgllahir"))
            .txtJamPeriksa.SetText IIf(IsNull(rs("jamperiksa")), "-", rs("jamperiksa"))
'            .txtPekerjaan.SetText rs!pekerjaan
            .txtTanggalLahir.SetText rs!tgllahir
'            .txtNoUrut.SetText nosurat
            .txtMorphine.SetText IIf(IsNull(rs("morphine")), "Negatif", rs("morphine"))
            .txtAmphetamine.SetText IIf(IsNull(rs("amphetamine")), "Negatif", rs("amphetamine"))
            .txtMariyuana.SetText IIf(IsNull(rs("mariyuana")), "Negatif", rs("mariyuana"))
            .txtMetamphetamine.SetText IIf(IsNull(rs("metamphetemaine")), "Negatif", rs("metamphetemaine"))
            .txtCocaine.SetText IIf(IsNull(rs("cocaine")), "Negatif", rs("cocaine"))
            .txtBenzidiazepine.SetText IIf(IsNull(rs("benzodizepin")), "Negatif", rs("benzodizepin"))
            .txtKesimpulan.SetText IIf(IsNull(rs("keterangan")), "-", rs("keterangan"))
            .txtKesimpulan2.SetText IIf(IsNull(rs("kesimpulan")), "Negatif", rs("kesimpulan"))
            
            If view = "false" Then
                Dim strPrinter As String
                strPrinter = GetTxt("Setting.ini", "Printer", "SuratKeterangan")
                ReportSkbn.SelectPrinter "winspool", strPrinter, "Ne00:"
                ReportSkbn.PrintOut False
                Unload Me
            Else
                With CRViewer1
                    .ReportSource = ReportSkbn
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

Public Sub CetakSkbw(strNorec As String, strIdPegawai As String, view As String)
'On Error GoTo errLoad
bolSKD = False
bolSIS = False
bolSkbn = False
bolSkbw = True
bolLahir = False
Set frmSuratDokter = Nothing
Set frmCRCetakPasienPerjanjian = Nothing
Set ReportSkbw = New crCetakSkbw

    ReadRs " SELECT sk.*,pm.nocm,pd.noregistrasi,pm.namapasien,pm.tgllahir,to_char(pm.tgllahir, 'DD-MM-YYYY') AS tglkelahiran,pd.tglregistrasi, " & _
           " pm.tempatlahir,jk.jeniskelamin,alm.alamatlengkap,CASE WHEN pk.pekerjaan IS NULL THEN '' ELSE pk.pekerjaan END AS pekerjaan, " & _
           " to_char(sk.tglsurat, 'DD-MM-YYYY') AS tglperiksa,to_char(sk.tglsurat, 'HH:mm') AS jamperiksa,bw.butawarna " & _
           " FROM suratketerangan_t AS sk " & _
           " INNER JOIN pasiendaftar_t AS pd ON pd.norec = sk.pasiendaftarfk" & _
           " INNER JOIN pasien_m AS pm ON pm. ID = pd.nocmfk" & _
           " LEFT JOIN alamat_m AS alm ON alm.nocmfk = pm. ID" & _
           " LEFT JOIN jeniskelamin_m AS jk ON jk. ID = pm.objectjeniskelaminfk" & _
           " LEFT JOIN pekerjaan_m AS pk ON pk. ID = pm.objectpekerjaanfk" & _
           " LEFT JOIN butawarna_m AS bw ON bw.id = sk.butawarnafk " & _
           " WHERE sk.norec = '" & strNorec & "' LIMIT 1"
    
'    ReadRs strSQL
    
    With ReportSkbw
        If Not rs.EOF Then
            .txtNamaPemerintahan.SetText strNamaPemerintah
            .txtNamaRs.SetText strNamaLengkapRs
            .txtAlamatRs.SetText stralmtLengkapRs
            .txtWeb.SetText strEmail & ", " & strWebSite
            .txtKota.SetText strNamaKota & ", "
            .txtNamaPasien.SetText rs!namapasien
            .txtAlamatPasien.SetText rs!alamatlengkap
            .txtPekerjaan.SetText IIf(IsNull(rs("pekerjaan")), "-", rs("pekerjaan"))
            .txtUmur.SetText UCase(IIf(IsNull(rs("tglkelahiran")), "-", rs("tglkelahiran"))) & " / " & " (" & hitungUmur(Format(rs!tgllahir, "yyyy/MM/dd"), Format(rs!tglRegistrasi, "yyyy/MM/dd")) & ")"
'            .txtPekerjaan.SetText rs!pekerjaan
'            .txtNoUrut.SetText nosurat
            .txtKeterangan.SetText IIf(IsNull(rs("butawarna")), "-", rs("butawarna"))
            .txtKeperluan.SetText IIf(IsNull(rs("keperluansurat")), "-", rs("keperluansurat"))
            
            If view = "false" Then
                Dim strPrinter As String
                strPrinter = GetTxt("Setting.ini", "Printer", "SuratKeterangan")
                ReportSkbw.SelectPrinter "winspool", strPrinter, "Ne00:"
                ReportSkbw.PrintOut False
                Unload Me
            Else
                With CRViewer1
                    .ReportSource = ReportSkbw
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
Public Sub CetakLahir(strNorec As String, view As String)
'On Error GoTo errLoad
bolSKD = False
bolSIS = False
bolSkbn = False
bolSkbw = False
bolLahir = True
Set frmSuratDokter = Nothing
Set frmCRCetakPasienPerjanjian = Nothing
Set ReportLahir = New crCetakSuratLahir

    ReadRs " SELECT ak.alamat, ak.beratbayi,ak.jeniskelaminbayi, ak.kabupaten," & _
           " ak.kecamatan, ak.kelahiranke, ak.kelurahan,ak.ktpayah," & _
           " ak.ktpibu, ak.namaayah,ak.noakte, ak.namaibu,ak.normbayi,ak.normibu,ak.jeniskelahiran," & _
           " ak.panjangbayi,ak.pekerjaanayah,ak.pekerjaanibu, ak.propinsi," & _
           " to_char(ak.tgllahirayah, 'DD-Mon-YYYY')AS tgllahirayah ," & _
           " to_char(ak.tgllahirbayi, 'DD-Mon-YYYY')AS tgllahirbayi," & _
           " to_char(ak.tgllahirbayi, 'HH24:MI')AS jamlahir," & _
           " to_char(ak.tgllahiribu, 'DD-Mon-YYYY')AS tgllahiribu," & _
           " pg.namalengkap FROM aktekelahiran_t as ak" & _
           " LEFT JOIN pegawai_m as pg on pg.id= ak.objectpegawaifk" & _
           " WHERE ak.norec = '" & strNorec & "' LIMIT 1"
    
'    ReadRs strSQL
    
    With ReportLahir
        If Not rs.EOF Then
            .txtNamaPemerintahan.SetText strNamaPemerintah
            .txtNamaRs.SetText strNamaLengkapRs
            .txtAlamatRs.SetText stralmtLengkapRs
            .txtWeb.SetText strEmail & ", " & strWebSite
            .txtKota.SetText strNamaKota & ", "
            .txtTglLahir.SetText IIf(IsNull(rs("tgllahirbayi")), "-", rs("tgllahirbayi"))
            .txtkelamin.SetText IIf(IsNull(rs("jeniskelaminbayi")), "-", rs("jeniskelaminbayi"))
            .txtkelahiranke.SetText IIf(IsNull(rs("kelahiranke")), "-", rs("kelahiranke"))
            .txtpanjangbadan.SetText IIf(IsNull(rs("panjangbayi")), "-", rs("panjangbayi"))
            .txtiburm.SetText IIf(IsNull(rs("normibu")), "-", rs("normibu"))
            .txtibu.SetText IIf(IsNull(rs("namaibu")), "-", rs("namaibu"))
            .txtibutgl.SetText IIf(IsNull(rs("tgllahiribu")), "-", rs("tgllahiribu"))
            .txtibujob.SetText IIf(IsNull(rs("pekerjaanibu")), "-", rs("pekerjaanibu"))
            .txtibuktp.SetText IIf(IsNull(rs("ktpibu")), "-", rs("ktpibu"))
            .txtayah.SetText IIf(IsNull(rs("namaayah")), "-", rs("namaayah"))
            .txtayahjob.SetText IIf(IsNull(rs("pekerjaanayah")), "-", rs("pekerjaanayah"))
            .txtayahktp.SetText IIf(IsNull(rs("ktpayah")), "-", rs("ktpayah"))
            .txtkelurahan.SetText IIf(IsNull(rs("kelurahan")), "-", rs("kelurahan"))
            .txtkecamatan.SetText IIf(IsNull(rs("kecamatan")), "-", rs("kecamatan"))
            .txtkabupaten.SetText IIf(IsNull(rs("kabupaten")), "-", rs("kabupaten"))
            .txtpropinsi.SetText IIf(IsNull(rs("propinsi")), "-", rs("propinsi"))
            .txtrmbayi.SetText IIf(IsNull(rs("normbayi")), "-", rs("normbayi"))
            .txtberatlahir.SetText IIf(IsNull(rs("beratbayi")), "-", rs("beratbayi"))
            .txtayahtgl.SetText IIf(IsNull(rs("tgllahirayah")), "-", rs("tgllahirayah"))
            .txtalamat.SetText IIf(IsNull(rs("alamat")), "-", rs("alamat"))
            .txtjamlahir.SetText IIf(IsNull(rs("jamlahir")), "-", rs("jamlahir"))
            .txtNamaDokter.SetText IIf(IsNull(rs("namalengkap")), "-", rs("namalengkap"))
            .txtjeniskelahiran.SetText IIf(IsNull(rs("jeniskelahiran")), "-", rs("jeniskelahiran"))
            .txtNoUrut.SetText IIf(IsNull(rs("noakte")), "-", rs("noakte"))
'            .txtPekerjaan.SetText rs!pekerjaan
'            .txtNoUrut.SetText nosurat
'            .txtKeterangan.SetText IIf(IsNull(rs("butawarna")), "-", rs("butawarna"))
'           .txtKeperluan.SetText IIf(IsNull(rs("keperluansurat")), "-", rs("keperluansurat"))
            
            If view = "false" Then
                Dim strPrinter As String
                strPrinter = GetTxt("Setting.ini", "Printer", "SuratKeterangan")
                ReportLahir.SelectPrinter "winspool", strPrinter, "Ne00:"
                ReportLahir.PrintOut False
                Unload Me
            Else
                With CRViewer1
                    .ReportSource = ReportLahir
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





