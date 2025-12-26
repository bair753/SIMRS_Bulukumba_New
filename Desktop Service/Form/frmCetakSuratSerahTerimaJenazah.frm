VERSION 5.00
Object = "{C4847593-972C-11D0-9567-00A0C9273C2A}#8.0#0"; "crviewer.dll"
Begin VB.Form frmCetakSuratSerahTerimaJenazah 
   Caption         =   "Transmedic"
   ClientHeight    =   7005
   ClientLeft      =   60
   ClientTop       =   345
   ClientWidth     =   5820
   Icon            =   "frmCetakSuratSerahTerimaJenazah.frx":0000
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
Attribute VB_Name = "frmCetakSuratSerahTerimaJenazah"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Option Explicit
Dim Report As New crSuratSerahTerimaJenazah
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
    Set frmCetakSuratSerahTerimaJenazah = Nothing
End Sub

Public Sub Cetak(strNoregistrasi As String, strUser As String, view As String)
'On Error GoTo errLoad
Dim adocmd As New ADODB.Command
Dim strSQL As String
Dim idPegawai As String
Dim Noregistrasi As String
Dim User As String
Set frmCetakSuratSerahTerimaJenazah = Nothing
Set Report = New crSuratSerahTerimaJenazah
Dim hari, jeniskelamin As String
If strNoregistrasi <> "" Then
    Noregistrasi = strNoregistrasi
Else
    Noregistrasi = ""
End If

If strUser <> "" Then
    User = strUser
Else
    User = " - "
End If

    With Report
        
        Set adoReport = New ADODB.Command
        adoReport.ActiveConnection = CN_String
              
        strSQL = " SELECT pg1.namalengkap AS petugas,jb.namajabatan,spj.umur,pm.nocm AS norm,pd.noregistrasi,pm.namapasien, " & _
                 " pm.tgllahir,pd.tglregistrasi,pm.nosuratkematian,ag.agama,kg.name AS kebangsaan,ru.namaruangan,jk.jeniskelamin, " & _
                 " to_char(pm.tgllahir,'DD-MM-YYYY') AS tglkelahiran,to_char(pd.tglregistrasi,'DD-MM-YYYY') AS tglrawat,kp.kelompokpasien,alm.alamatlengkap, " & _
                 " pg2.namalengkap AS petugasjenazah,pg2.nippns,spj.penanggungjawab || ' / ' || CASE WHEN spj.noidentitas IS NULL " & _
                 " THEN '' ELSE spj.noidentitas END AS penanggungjawab,hk.hubungankeluarga,to_char(pd.tglmeninggal,'DD-MM-YYYY') AS tglKematian, " & _
                 " to_char(pd.tglmeninggal, 'HH:MI:SS') AS jamKematian,to_char(pd.tglmeninggal, 'YYYY') AS tahunkematian, " & _
                 " to_char(pd.tglmeninggal, 'MM') AS bulanKematian,to_char(pd.tglmeninggal, 'DD') AS tgl,pd.tglmeninggal,spj.penanggungjawab AS namapenanggungjawab " & _
                 " FROM pasiendaftar_t AS pd " & _
                 " INNER JOIN pasien_m AS pm ON pm.id = pd.nocmfk " & _
                 " LEFT JOIN suratpelimpahanjenazah_t AS spj ON spj.pasiendaftarfk = pd.norec " & _
                 " LEFT JOIN jeniskelamin_m AS jk ON jk.id = pm.objectjeniskelaminfk " & _
                 " LEFT JOIN alamat_m AS alm ON alm.nocmfk = pm.id " & _
                 " LEFT JOIN penyebabkematian_m AS pk ON pk.id = pd.objectpenyebabkematianfk " & _
                 " LEFT JOIN pegawai_m AS pg ON pg.id = pd.objectdokterpemeriksafk " & _
                 " LEFT JOIN pegawai_m AS pg1 ON pg1.id = spj.petugasruanganfk " & _
                 " LEFT JOIN pegawai_m AS pg2 ON pg2.id = spj.petugasjenazahfk " & _
                 " LEFT JOIN jabatan_m AS jb ON jb.id = spj.jabatanfk " & _
                 " LEFT JOIN jeniskelamin_m AS jk1 ON jk1.id = spj.objectjeniskelaminfk " & _
                 " LEFT JOIN hubungankeluarga_m AS hk ON hk.id = spj.objecthubungankeluargafk " & _
                 " LEFT JOIN kebangsaan_m AS kg ON kg.id = pm.objectkebangsaanfk " & _
                 " LEFT JOIN ruangan_m AS ru ON ru.id = pd.objectruanganlastfk " & _
                 " LEFT JOIN kelompokpasien_m AS kp ON kp.id = pd.objectkelompokpasienlastfk " & _
                 " LEFT JOIN agama_m AS ag ON ag.id = pm.objectagamafk " & _
                 " WHERE pd.noregistrasi = '" & Noregistrasi & "' "

       ReadRs strSQL
        
        adoReport.CommandText = strSQL
        adoReport.CommandType = adCmdUnknown
        .database.AddADOCommand CN_String, adoReport
        .txtNamaPemerintahan.SetText strNamaPemerintah
        .txtNamaRs.SetText strNamaLengkapRs
        .txtAlamatRs.SetText stralmtLengkapRs
        .txtNamaKota.SetText strNamaKota & ", "
        .txtNamaKota1.SetText strNamaKota & ", "
        If Not rs.EOF Then
            hari = getHari(Format(rs!tglmeninggal, "yyyy/MM/dd"))
            jeniskelamin = IIf(IsNull(rs("jeniskelamin")), "-", rs("jeniskelamin"))
            If IsNull(rs!tgllahir) Then
               .txtUmurPasien.SetText "-"
            Else
               .txtUmurPasien.SetText IIf(IsNull(rs("tglkelahiran")), "-", rs("tglkelahiran")) & " (" & hitungUmurNew(Format(rs!tgllahir, "yyyy/MM/dd"), Format(rs!tglRegistrasi, "yyyy/MM/dd")) & " )"
            End If
            .txtNamaPetugas.SetText IIf(IsNull(rs("petugas")), "-", rs("petugas"))
            .txtUmurPetugas.SetText IIf(IsNull(rs("umur")), "-", rs("umur"))
            .txtJabatanPetugas.SetText IIf(IsNull(rs("namajabatan")), "-", rs("namajabatan"))
            .txtTglMeninggal.SetText IIf(IsNull(rs("tgl")), "-", rs("tgl"))
            .txtBulanMeninggal.SetText IIf(IsNull(rs("bulanKematian")), "-", rs("bulanKematian"))
            .txtTahunMeninggal.SetText IIf(IsNull(rs("tahunkematian")), "-", rs("tahunkematian"))
            .txtJamMeninggal.SetText IIf(IsNull(rs("jamKematian")), "-", rs("jamKematian"))
            .txtNamaPasien.SetText IIf(IsNull(rs("namapasien")), "-", rs("namapasien"))
            .txtSKK.SetText IIf(IsNull(rs("nosuratkematian")), "-", rs("nosuratkematian"))
            .txtNoregistrasi.SetText IIf(IsNull(rs("noregistrasi")), "-", rs("noregistrasi"))
            .txtNoRekamMedis.SetText IIf(IsNull(rs("norm")), "-", rs("norm"))
            .txtJenisKelamin.SetText IIf(IsNull(rs("jeniskelamin")), "-", rs("jeniskelamin"))
            .txtKebangsaan.SetText IIf(IsNull(rs("kebangsaan")), "-", rs("kebangsaan"))
            .txtRuangan.SetText IIf(IsNull(rs("namaruangan")), "-", rs("namaruangan"))
            .tglRawat.SetText IIf(IsNull(rs("tglrawat")), "-", rs("tglrawat"))
            .txtTipePasien.SetText IIf(IsNull(rs("kelompokpasien")), "-", rs("kelompokpasien"))
            .txtDiagnosa.SetText IIf(IsNull(rs("namapasien")), "-", rs("namapasien"))
            .txtAlamatPasien.SetText IIf(IsNull(rs("alamatlengkap")), "-", rs("alamatlengkap"))
            .txtPetugas.SetText IIf(IsNull(rs("petugas")), "-", rs("petugas"))
            .txtPenerima.SetText IIf(IsNull(rs("petugasjenazah")), "-", rs("petugasjenazah"))
            .txtNipPenerima.SetText "NIP : " & IIf(IsNull(rs("nippns")), "-", rs("nippns"))
            .txtPenanggunJawab.SetText IIf(IsNull(rs("penanggungjawab")), "-", rs("penanggungjawab"))
            .txtHubungan.SetText IIf(IsNull(rs("hubungankeluarga")), "-", rs("hubungankeluarga"))
            .txtHari.SetText hari
            .txtTglM.SetText IIf(IsNull(rs("tgl")), "-", rs("tgl"))
            .txtBlnM.SetText IIf(IsNull(rs("bulanKematian")), "-", rs("bulanKematian"))
            .txtTahunM.SetText IIf(IsNull(rs("tahunkematian")), "-", rs("tahunkematian"))
            .txtPenanggungJawab.SetText IIf(IsNull(rs("namapenanggungjawab")), "-", rs("namapenanggungjawab"))
        Else
            .txtNamaPetugas.SetText " "
            .txtUmurPetugas.SetText " "
            .txtJabatanPetugas.SetText " "
            .txtTglMeninggal.SetText " "
            .txtBulanMeninggal.SetText " "
            .txtTahunMeninggal.SetText " "
            .txtJamMeninggal.SetText " "
            .txtNamaPasien.SetText " "
            .txtSKK.SetText " "
            .txtNoregistrasi.SetText " "
            .txtNoRekamMedis.SetText " "
            .txtUmurPasien.SetText " "
            .txtJenisKelamin.SetText " "
            .txtKebangsaan.SetText " "
            .txtRuangan.SetText " "
            .tglRawat.SetText " "
            .txtTipePasien.SetText " "
            .txtDiagnosa.SetText " "
            .txtAlamatPasien.SetText " "
            .txtPetugas.SetText " "
            .txtPenerima.SetText " "
            .txtNipPenerima.SetText " "
            .txtPenanggunJawab.SetText " "
            .txtHubungan.SetText " "
            .txtHari.SetText " "
            .txtTglM.SetText " "
            .txtBlnM.SetText " "
            .txtPenanggungJawab.SetText " "
        End If

        If view = "false" Then
            strPrinter1 = GetTxt("Setting.ini", "Printer", "SuratSerahTerimaJenazah")
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
