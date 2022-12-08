VERSION 5.00
Object = "{C4847593-972C-11D0-9567-00A0C9273C2A}#8.0#0"; "crviewer.dll"
Begin VB.Form frmLembarIdentitas 
   Caption         =   "Transmedic"
   ClientHeight    =   7005
   ClientLeft      =   60
   ClientTop       =   345
   ClientWidth     =   5820
   Icon            =   "frmLembarIdentitas.frx":0000
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
Attribute VB_Name = "frmLembarIdentitas"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Option Explicit
Dim Report As New crSuratLembarIdentitasMP 'crSuratLembarIdentitas

        Dim strDeviceName As String
        Dim strDriverName As String
        Dim strPort As String
        Dim bolStrukResep As Boolean

Private Sub cmdCetak_Click()
' If cboPrinter.Text = "" Then MsgBox "Printer belum dipilih", vbInformation, ".: Information": Exit Sub
'    If bolStrukResep = True Then
'        Report.SelectPrinter "winspool", cboPrinter.Text, "Ne00:"
'        PrinterNama = cboPrinter.Text
'        Report.PrintOut False
'  Report.PrintOut False
'    End If
    Report.SelectPrinter "winspool", cboPrinter.Text, "Ne00:"
    'PrinterNama = cboPrinter.Text
    Report.PrintOut False
End Sub

Private Sub CmdOption_Click()
    If bolStrukResep = True Then
        Report.PrinterSetup Me.hwnd
    End If
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

    Set frmLembarIdentitas = Nothing
End Sub

Public Sub Cetak(nocm As String, noreg As String, caraBayar As String, umur As String, Petugas As String, view As String)
'On Error GoTo errLoad
'On Error Resume Next
Set frmLembarIdentitas = Nothing
Dim adocmd As New ADODB.Command
Dim strNocm As String
Dim strUmur As String
Dim strcaraBayar As String
Dim strPetugas As String
Dim strPenanggungjawab As String
Dim tglRegis As String
Dim JamRegis As String

strNocm = ""
If nocm <> "" Then
    strNocm = nocm
Else
    strNocm = ""
End If

If umur <> "" Then
    strUmur = umur
Else
    strUmur = "0"
End If

If Petugas <> "" Then
    strPetugas = Petugas
Else
    strPetugas = "-"
End If

If caraBayar <> "" Then
    strcaraBayar = caraBayar
Else
    strcaraBayar = "-"
End If
        ' SQLSERVER
'        strSQL = "select top 1 pm.nocm,pm.namapasien,pm.tempatlahir,convert(varchar, pm.tgllahir, 105) as tgllahir, " & _
'             "case when sp.statusperkawinan is null then '-' else sp.statusperkawinan end as statusperkawinan, " & _
'             "case when ag.agama is null then '-' else ag.agama end as agama, " & _
'             "case when pk.pekerjaan is null then '-' else pk.pekerjaan end as pekerjaan, " & _
'             "alm.alamatlengkap,alm.namadesakelurahan,alm.kecamatan, " & _
'             "alm.kotakabupaten,prop.namapropinsi,alm.kodepos,pm.alamatktr, " & _
'             "case when pm.nohp is null then '-' else pm.nohp end as notelepon, " & _
'             "case when pm.noidentitas is null then '-' else pm.noidentitas end as noidentitas, " & _
'             "case when gd.golongandarah is null then '-' else gd.golongandarah end as golongandarah, " & _
'             "case when pen.pendidikan is null then '-' else pen.pendidikan end as pendidikan, " & _
'             "case when pm.noasuransilain is null then '-' else  pm.noasuransilain end as noasuransilain, " & _
'             "case when pm.nobpjs is null then '-' else pm.nobpjs end as nobpjs,jk.jeniskelamin, " & _
'             "pm.penanggungjawab,pm.hubungankeluargapj,pm.pekerjaanpenangggungjawab,pm.ktppenanggungjawab, " & _
'             "pm.alamatrmh, pm.alamatrmh, pm.namaayah, pm.namaibu, pm.namasuamiistri, " & _
'             "pm.teleponpenanggungjawab,pm.bahasa,pm.alamatdokterpengirim,pm.dokterpengirim,pm.jeniskelaminpenanggungjawab,pm.umurpenanggungjawab " & _
'             "from pasien_m as pm LEFT JOIN statusperkawinan_m as sp on sp.id = pm.objectstatusperkawinanfk " & _
'             "LEFT JOIN agama_m as ag on ag.id = pm.objectagamafk LEFT JOIN pekerjaan_m as pk on pk.id = pm.objectpekerjaanfk " & _
'             "LEFT JOIN pendidikan_m as pen on pen.id = pm.objectpendidikanfk LEFT JOIN alamat_m as alm on alm.nocmfk = pm.id " & _
'             "LEFT JOIN propinsi_m as prop on prop.id = alm.objectpropinsifk LEFT JOIN golongandarah_m as gd on gd.id = pm.objectgolongandarahfk " & _
'             "LEFT JOIN jeniskelamin_m as jk on jk.id = pm.objectjeniskelaminfk " & _
'             "where pm.nocm ='" & strNocm & "' "
        'POSTGRESQL
         strSQL = "select pm.nocm,pm.namapasien,pm.tempatlahir,to_char(pm.tgllahir, 'DD-MM-YYYY') AS tgllahir, " & _
                "case when sp.statusperkawinan is null then '-' else sp.statusperkawinan end as statusperkawinan, " & _
                "case when ag.agama is null then '-' else ag.agama end as agama,CASE WHEN pg2.namalengkap IS NULL THEN '-' ELSE pg2.namalengkap END AS namauser,case when pk.pekerjaan is null then '-' else pk.pekerjaan end as pekerjaan, " & _
                "alm.alamatlengkap,alm.namadesakelurahan,alm.kecamatan,alm.kotakabupaten,prop.namapropinsi,alm.kodepos,pm.alamatktr, " & _
                "case when pm.nohp is null then '-' else pm.nohp end as notelepon,case when pm.noidentitas is null then '-' else pm.noidentitas end as noidentitas, " & _
                "case when gd.golongandarah is null then '-' else gd.golongandarah end as golongandarah, " & _
                "case when pen.pendidikan is null then '-' else pen.pendidikan end as pendidikan,kn.name as kebangsaan, " & _
                "CASE WHEN pm.noasuransilain IS NOT NULL THEN pm.noasuransilain WHEN pm.nobpjs IS NOT NULL THEN pm.nobpjs ELSE '-' END AS noasuransilain,jk.jeniskelamin,pm.penanggungjawab,pm.hubungankeluargapj,pm.pekerjaanpenangggungjawab,pm.ktppenanggungjawab, " & _
                "pm.alamatrmh as almtpenanggungjawab,pm.namaayah, pm.namaibu, pm.namasuamiistri,pm.teleponpenanggungjawab,pm.bahasa,pm.alamatdokterpengirim,pm.dokterpengirim,pm.jeniskelaminpenanggungjawab,pm.umurpenanggungjawab,ru.namaruangan,pg.namalengkap,kp.kelompokpasien, " & _
                "EXTRACT(YEAR FROM AGE(pd.tglregistrasi, pm.tgllahir)) || ' Tahun/Year ' || EXTRACT(MONTH FROM AGE(pd.tglregistrasi, pm.tgllahir)) || ' Bulan/Month ' || EXTRACT(DAY FROM AGE(pd.tglregistrasi, pm.tgllahir)) || ' Hari/Day' AS umur,to_char( pd.tglregistrasi, 'DD-MM-YYYY' ) AS tglregis,to_char( pd.tglregistrasi, 'HH24:mm' ) AS jamregis,arj.asalrujukan,pm.namaayah || '/' || pm.namaibu as namaorangtua,hp.hubunganpeserta " & _
                "FROM pasiendaftar_t as pd INNER JOIN pasien_m AS pm ON pm.id = pd.nocmfk inner join antrianpasiendiperiksa_t as apd on apd.noregistrasifk = pd.norec LEFT JOIN asalrujukan_m as arj on arj.id = apd.objectasalrujukanfk " & _
                "LEFT JOIN statusperkawinan_m as sp on sp.id = pm.objectstatusperkawinanfk " & _
                "LEFT JOIN agama_m as ag on ag.id = pm.objectagamafk LEFT JOIN pekerjaan_m as pk on pk.id = pm.objectpekerjaanfk " & _
                "LEFT JOIN pendidikan_m as pen on pen.id = pm.objectpendidikanfk LEFT JOIN alamat_m as alm on alm.nocmfk = pm.id " & _
                "LEFT JOIN propinsi_m as prop on prop.id = alm.objectpropinsifk LEFT JOIN golongandarah_m as gd on gd.id = pm.objectgolongandarahfk " & _
                "LEFT JOIN jeniskelamin_m as jk on jk.id = pm.objectjeniskelaminfk " & _
                "LEFT JOIN ruangan_m as ru on ru.id = pd.objectruanganlastfk " & _
                "LEFT JOIN pegawai_m as pg on pg.id = pd.objectdokterpemeriksafk " & _
                "LEFT JOIN kelompokpasien_m as kp on kp.id = pd.objectkelompokpasienlastfk " & _
                "LEFT JOIN batalregistrasi_t AS br ON br.pasiendaftarfk = pd.norec " & _
                "LEFT JOIN logginguser_t AS lg ON lg.noreff = pd.norec and lg.jenislog = 'Pendaftaran Pasien' " & _
                "LEFT JOIN loginuser_s AS lu ON lu.id = lg.objectloginuserfk " & _
                "LEFT JOIN pegawai_m AS pg2 ON pg2.id = lu.objectpegawaifk " & _
                "LEFT JOIN kebangsaan_m AS kn ON kn.id = pm.objectkebangsaanfk LEFT JOIN pemakaianasuransi_t as pa on pa.noregistrasifk = pd.norec LEFT JOIN asuransipasien_m as am on am.id = pa.objectasuransipasienfk LEFT JOIN hubunganpesertaasuransi_m as hp on hp.id = am.objecthubunganpesertafk " & _
                "where br.norec IS NULL AND pd.noregistrasi = '" & noreg & "' and pd.statusenabled = true limit 1"
    
    ReadRs2 strSQL
'    If RS2.BOF Then
'        strPenanggungjawab = "-"
'    Else
'         If IsNull(RS2!penanggungjawab) Then
'             strPenanggungjawab = "-"
'         Else
'             strPenanggungjawab = RS2!penanggungjawab
'         End If
'
'    End If
    adocmd.CommandText = strSQL
    adocmd.CommandType = adCmdText
    With Report
        .database.AddADOCommand CN_String, adocmd
        If Not RS2.EOF Then
            .txtNamaRSTbl.SetText UCase(strNamaRS)
            .txtNamaRs.SetText strNamaLengkapRs
            .txtAlamatRs.SetText stralmtLengkapRs
            .txtNocm.SetText IIf(IsNull(RS2("nocm")), "", RS2("nocm"))
            .txtNamaPasien.SetText IIf(IsNull(RS2("namapasien")), "", RS2("namapasien"))
            .txtAgama.SetText IIf(IsNull(RS2("agama")), "", RS2("agama"))
            .txtalamat.SetText IIf(IsNull(RS2("alamatlengkap")), "", RS2("alamatlengkap"))
            .txtDirujuk.SetText IIf(IsNull(RS2("asalrujukan")), "", RS2("asalrujukan"))
            .txtTglLahir.SetText IIf(IsNull(RS2("tgllahir")), "", RS2("tgllahir"))
            .txtTelepone.SetText IIf(IsNull(RS2("notelepon")), "", RS2("notelepon"))
            .txtGolDarah.SetText IIf(IsNull(RS2("golongandarah")), "", RS2("golongandarah"))
            .txtJK.SetText IIf(IsNull(RS2("jeniskelamin")), "", RS2("jeniskelamin"))
            .txtStatusPerkawinan.SetText IIf(IsNull(RS2("statusperkawinan")), "", RS2("statusperkawinan"))
            .txtPendidikan.SetText IIf(IsNull(RS2("pendidikan")), "", RS2("pendidikan"))
            .txtPekerjaan.SetText IIf(IsNull(RS2("pekerjaan")), "", RS2("pekerjaan"))
            .txtNamaAyahIbu.SetText IIf(IsNull(RS2("namaorangtua")), "", RS2("namaorangtua"))
            .txtNamaSuamiIstri.SetText IIf(IsNull(RS2("namasuamiistri")), "", RS2("namasuamiistri"))
            .txtTipeBayar.SetText IIf(IsNull(RS2("kelompokpasien")), "", RS2("kelompokpasien"))
            .txtNoBpjs.SetText IIf(IsNull(RS2("noasuransilain")), "", RS2("noasuransilain"))
            .txtStatusKepesertaan.SetText IIf(IsNull(RS2("hubunganpeserta")), "", RS2("hubunganpeserta"))
            .txtTanggalKunjungan.SetText IIf(IsNull(RS2("tglregis")), "", RS2("tglregis"))
            .txtJam.SetText IIf(IsNull(RS2("jamregis")), "", RS2("jamregis"))
        End If
        
        If view = "false" Then
            Dim strPrinter As String
            strPrinter = GetTxt("Setting.ini", "Printer", "CetakLembarIdentitas")
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
            Screen.MousePointer = vbDefault
        End If
        
    End With
Exit Sub
errLoad:
End Sub
