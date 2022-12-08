VERSION 5.00
Object = "{C4847593-972C-11D0-9567-00A0C9273C2A}#8.0#0"; "crviewer.dll"
Begin VB.Form frmPermohonanPelayananJenazah 
   Caption         =   "Transmedic"
   ClientHeight    =   7005
   ClientLeft      =   60
   ClientTop       =   345
   ClientWidth     =   5820
   Icon            =   "frmPermohonanPelayananJenazah.frx":0000
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
Attribute VB_Name = "frmPermohonanPelayananJenazah"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Option Explicit
Dim Report As New crSuratPermohonanPelayananJenazah
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
    Set frmPermohonanPelayananJenazah = Nothing
End Sub

Public Sub Cetak(strNoregistrasi As String, strIdPegawai As String, view As String)
'On Error GoTo errLoad
Dim adocmd As New ADODB.Command
Dim strSQL As String
Dim idPegawai As String
Dim Noregistrasi As String
Dim User As String
Set frmPermohonanPelayananJenazah = Nothing
Set Report = New crSuratPermohonanPelayananJenazah
If strNoregistrasi <> "" Then
    Noregistrasi = strNoregistrasi
Else
    Noregistrasi = ""
End If

If strIdPegawai <> "" Then
    User = strIdPegawai
Else
    User = " - "
End If
    
If strIdPegawai <> "" Then
   idPegawai = strIdPegawai
Else
   idPegawai = ""
End If


    With Report
        
        Set adoReport = New ADODB.Command
        adoReport.ActiveConnection = CN_String
              
        strSQL = " SELECT CASE WHEN spj.objectjeniskelaminfk = 1 THEN 'Tn ' || spj.penanggungjawab " & _
                 " WHEN spj.objectjeniskelaminfk = 2 THEN 'Ny ' || spj.penanggungjawab END AS penanggungjawab, " & _
                 " hk.hubungankeluarga,spj.alamat,pg.namalengkap AS petugassatu,pg1.namalengkap AS namapetugasdua,pg2.namalengkap AS namapetugastiga, " & _
                 " pg3.namalengkap AS namapetugasempat,pg4.namalengkap AS namapetugaslima, " & _
                 " pm.namapasien,pm.nocm,jk1.jeniskelamin AS jkpasien,pm.nobpjs,to_char(pm.tgllahir, 'DD-MM-YYYY') || ' (' || EXTRACT(YEAR FROM AGE(to_date(to_char(pd.tglregistrasi,'YYYY-MM-DD'),'YYYY-MM-DD'),to_date(to_char(pm.tgllahir,'YYYY-MM-DD'),'YYYY-MM-DD'))) || 'Thn ' || " & _
                 " EXTRACT(MONTH FROM AGE(to_date(to_char(pd.tglregistrasi,'YYYY-MM-DD'),'YYYY-MM-DD'),to_date(to_char(pm.tgllahir,'YYYY-MM-DD'),'YYYY-MM-DD'))) || ' Bln ' || " & _
                 " EXTRACT(MONTH FROM AGE(to_date(to_char(pd.tglregistrasi,'YYYY-MM-DD'),'YYYY-MM-DD'),to_date(to_char(pm.tgllahir,'YYYY-MM-DD'),'YYYY-MM-DD'))) || ' Hr)' AS tgllahir, " & _
                 " alm.alamatlengkap,ru.namaruangan,to_char(pd.tglregistrasi, 'DD-MM-YYYY') AS tglregistrasi, " & _
                 " to_char(pd.tglpulang, 'DD-MM-YYYY') AS tglpulang,spj.nosurat,spj.covid,spj.noncovid,spj.pemulasaraanjenazah, " & _
                 " spj.pengkafanan,spj.plastisisasi,spj.kantongjenazah,spj.petijenazah,spj.disinfektanjenazah,spj.pelayanankerohanian, " & _
                 " spj.transportasiambulan,spj.disinfektanambulan " & _
                 " FROM pasiendaftar_t AS pd " & _
                 " INNER JOIN suratpermohonanjenazah_t AS spj ON spj.pasiendaftarfk = pd.norec " & _
                 " INNER JOIN pasien_m AS pm ON pm.id = pd.nocmfk " & _
                 " LEFT JOIN jeniskelamin_m AS jk1 ON jk1.id = pm.objectjeniskelaminfk " & _
                 " LEFT JOIN alamat_m AS alm ON alm.nocmfk = pm.id " & _
                 " LEFT JOIN ruangan_m AS ru ON ru.id = pd.objectruanganlastfk " & _
                 " LEFT JOIN jeniskelamin_m AS jk ON jk.id = spj.objectjeniskelaminfk " & _
                 " LEFT JOIN hubungankeluarga_m AS hk ON hk.id = spj.objecthubungankeluargafk " & _
                 " LEFT JOIN pegawai_m AS pg ON pg.id = spj.petugassatu " & _
                 " LEFT JOIN pegawai_m AS pg1 ON pg1.id = spj.petugasdua " & _
                 " LEFT JOIN pegawai_m AS pg2 ON pg2.id = spj.petugastiga " & _
                 " LEFT JOIN pegawai_m AS pg3 ON pg3.id = spj.petugasempat " & _
                 " LEFT JOIN pegawai_m AS pg4 ON pg4.id = spj.petugaslima" & _
                 " WHERE spj.norec = '" & Noregistrasi & "' "

        ReadRs strSQL
        adoReport.CommandText = strSQL
        adoReport.CommandType = adCmdUnknown
        .database.AddADOCommand CN_String, adoReport
        .txtNamaPemerintahan.SetText strNamaPemerintah
        .txtNamaRs.SetText strNamaLengkapRs
        .txtAlamatRs.SetText stralmtLengkapRs
        .txtAlamatRs1.SetText strAlamatRS
        .txtNamaKota.SetText strNamaKota & ", "
        If rs.EOF = False Then
            If rs("covid") = False Then
                .txtCovid.SetText ""
            Else
                .txtCovid.SetText "V"
            End If
            If rs("noncovid") = False Then
                .txtNonCovid.SetText ""
            Else
                .txtNonCovid.SetText "V"
            End If
            If rs("pemulasaraanjenazah") = False Then
                .txtSatuTidak.SetText "V"
                .txtSatuYa.SetText ""
            Else
                .txtSatuTidak.SetText ""
                .txtSatuYa.SetText "V"
            End If
            If rs("pengkafanan") = False Then
                .txtDuaTidak.SetText "V"
                .txtDuaYa.SetText ""
            Else
                .txtDuaTidak.SetText ""
                .txtDuaYa.SetText "V"
            End If
            If rs("plastisisasi") = False Then
                .txtTigaTidak.SetText "V"
                .txtTigaYa.SetText ""
            Else
                .txtTigaTidak.SetText ""
                .txtTigaYa.SetText "V"
            End If
            If rs("kantongjenazah") = False Then
                .txtEmpatTidak.SetText "V"
                .txtEmpatYa.SetText ""
            Else
                .txtEmpatTidak.SetText ""
                .txtEmpatYa.SetText "V"
            End If
            If rs("petijenazah") = False Then
                .txtLimaTidak.SetText "V"
                .txtLimaYa.SetText ""
            Else
                .txtLimaTidak.SetText ""
                .txtLimaYa.SetText "V"
            End If
            If rs("disinfektanjenazah") = False Then
                .txtEnamTidak.SetText "V"
                .txtEnamYa.SetText ""
            Else
                .txtEnamTidak.SetText ""
                .txtEnamYa.SetText "V"
            End If
            If rs("pelayanankerohanian") = False Then
                .txtTujuhTidak.SetText "V"
                .txtTujuhYa.SetText ""
            Else
                .txtTujuhTidak.SetText ""
                .txtTujuhYa.SetText "V"
            End If
            If rs("transportasiambulan") = False Then
                .txtDelapanTidak.SetText "V"
                .txtDelapanYa.SetText ""
            Else
                .txtDelapanTidak.SetText ""
                .txtDelapanYa.SetText "V"
            End If
            If rs("disinfektanambulan") = False Then
                .txtSembilanTidak.SetText "V"
                .txtSembilanYa.SetText ""
            Else
                .txtSembilanTidak.SetText ""
                .txtSembilanYa.SetText "V"
            End If
            .txtPenPasien.SetText IIf(IsNull(rs("penanggungjawab")), "-", rs("penanggungjawab"))
            .txtPemohon.SetText IIf(IsNull(rs("penanggungjawab")), "-", rs("penanggungjawab"))
            .txtHubPasien.SetText IIf(IsNull(rs("hubungankeluarga")), "-", rs("hubungankeluarga"))
            .txtAlamatPemohon.SetText IIf(IsNull(rs("alamat")), "-", rs("alamat"))
            .txtP3JSatu.SetText IIf(IsNull(rs("petugassatu")), "-", rs("petugassatu"))
            .txtP3JDua.SetText IIf(IsNull(rs("namapetugasdua")), "-", rs("namapetugasdua"))
            .txtP3JTiga.SetText IIf(IsNull(rs("namapetugastiga")), "-", rs("namapetugastiga"))
            .txtP3JEmpat.SetText IIf(IsNull(rs("namapetugasempat")), "-", rs("namapetugasempat"))
            .txtP3JLima.SetText IIf(IsNull(rs("namapetugaslima")), "-", rs("namapetugaslima"))
            .txtNamaPasien.SetText IIf(IsNull(rs("namapasien")), "-", rs("namapasien"))
            .txtNoBpjs.SetText IIf(IsNull(rs("nobpjs")), "-", rs("nobpjs"))
            .txtNoRekamMedis.SetText IIf(IsNull(rs("nocm")), "-", rs("nocm"))
            .txtUmurPasien.SetText IIf(IsNull(rs("tgllahir")), "-", rs("tgllahir"))
            .txtJenisKelamin.SetText IIf(IsNull(rs("jkpasien")), "-", rs("jkpasien"))
            .txtAlamatPasien.SetText IIf(IsNull(rs("alamatlengkap")), "-", rs("alamatlengkap"))
            .txtAsalRuangan.SetText IIf(IsNull(rs("namaruangan")), "-", rs("namaruangan"))
            .txtTglMasuk.SetText IIf(IsNull(rs("tglregistrasi")), "-", rs("tglregistrasi"))
            .txtTglKeluar.SetText IIf(IsNull(rs("tglpulang")), "-", rs("tglpulang"))
            .txtNosurat.SetText IIf(IsNull(rs("nosurat")), "-", rs("nosurat"))
            .txtPetugasSatu.SetText IIf(IsNull(rs("petugassatu")), "-", rs("petugassatu"))
            .txtPetugasDua.SetText IIf(IsNull(rs("namapetugasdua")), "-", rs("namapetugasdua"))
            .txtPetugasTiga.SetText IIf(IsNull(rs("namapetugastiga")), "-", rs("namapetugastiga"))
            .txtPetugasEmpat.SetText IIf(IsNull(rs("namapetugasempat")), "-", rs("namapetugasempat"))
            .txtPetugasLima.SetText IIf(IsNull(rs("namapetugaslima")), "-", rs("namapetugaslima"))
            
        End If
        If view = "false" Then
            strPrinter1 = GetTxt("Setting.ini", "Printer", "SuratPermohonanPelayananJenazah")
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
