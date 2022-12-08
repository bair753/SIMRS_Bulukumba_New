VERSION 5.00
Object = "{C4847593-972C-11D0-9567-00A0C9273C2A}#8.0#0"; "crviewer.dll"
Begin VB.Form frmExpertiseLaboratoriumHistopatologi 
   Caption         =   "Transmedic"
   ClientHeight    =   7005
   ClientLeft      =   60
   ClientTop       =   345
   ClientWidth     =   5820
   ClipControls    =   0   'False
   Icon            =   "frmExpertiseLaboratoriumHistopatologi.frx":0000
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
Attribute VB_Name = "frmExpertiseLaboratoriumHistopatologi"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Option Explicit
Dim Report As New crHasilLabHispatologi
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

    Set frmExpertiseLaboratoriumHistopatologi = Nothing
End Sub

Public Sub Cetak(strNorec As String, User As String, view As String)
'On Error GoTo errLoad
'On Error Resume Next
Set frmExpertiseLaboratoriumHistopatologi = Nothing
Dim strSQL As String
Dim StrFilter As String
Dim noorder As String
Dim stringExp As String
Dim Expertise As String
If strNorec <> "" Then
'    noorder = " (" & Left(strNorec, Len(strNorec) - 1) & ")"
    noorder = strNorec
End If

    With Report
            strSQL = " SELECT pd.noregistrasi,pm.nocm,pm.namapasien,jk.jeniskelamin || '/ ' || EXTRACT(YEAR FROM AGE(pd.tglregistrasi, pm.tgllahir)) || ' Thn ' " & _
                     " || EXTRACT(MONTH FROM AGE(pd.tglregistrasi, pm.tgllahir)) || ' Bln ' || EXTRACT(DAY FROM AGE(pd.tglregistrasi, pm.tgllahir)) || ' Hr' ||'(' || to_char(pm.tgllahir, 'DD-MM-YYYY') || ')' AS umur, " & _
                     " to_char(so.tglorder, 'DD-MM-YYYY HH24:MI:SS') AS tglorder,to_char(hpl.tanggal, 'DD-MM-YYYY HH24:MI:SS') AS tgljawab,to_char(pp.tglpelayanan, 'DD-MM-YYYY HH24:MI:SS') AS tglterima, " & _
                     " to_char(sbm.tglsbm, 'DD-MM-YYYY HH24:MI:SS') AS tglbayar,pg.namalengkap,CASE WHEN hpl.diagnosaklinik IS NULL THEN '' ELSE diagnosaklinik END AS diagnosaklinik, " & _
                     " CASE WHEN hpl.keteranganklinik IS NULL THEN '' ELSE hpl.keteranganklinik END AS keteranganklinik, CASE WHEN hpl.makroskopik IS NULL THEN '' ELSE hpl.makroskopik END AS makroskopik, " & _
                     " CASE WHEN hpl.mikroskopik IS NULL THEN '' ELSE hpl.mikroskopik END AS mikroskopik,CASE WHEN hpl.kesimpulan IS NULL THEN '' ELSE hpl.kesimpulan END AS kesimpulan, " & _
                     " CASE WHEN hpl.anjuran IS NULL THEN '' ELSE hpl.anjuran END AS anjuran,CASE WHEN hpl.topografi IS NULL THEN '' ELSE hpl.topografi END AS topografi, " & _
                     " CASE WHEN hpl.morfologi IS NULL THEN '' ELSE hpl.morfologi END AS morfologi,CASE WHEN hpl.diagnosapb IS NULL THEN '' ELSE hpl.diagnosapb END AS diagnosapb, " & _
                     " CASE WHEN hpl.keteranganpb IS NULL THEN '' ELSE hpl.keteranganpb END AS keteranganpb,CASE WHEN pg1.namalengkap IS NULL THEN '' ELSE pg1.namalengkap END AS namapenanggungjawab, " & _
                     " CASE WHEN pg1.nippns IS NULL THEN '' ELSE pg1.nippns END AS nippns,hpl.nomorpa " & _
                     " FROM hasilpemeriksaanlab_t AS hpl " & _
                     " INNER JOIN pasiendaftar_t AS pd ON pd.norec = hpl.noregistrasifk " & _
                     " INNER JOIN pelayananpasien_t AS pp ON pp.norec = hpl.pelayananpasienfk " & _
                     " LEFT JOIN strukorder_t AS so ON so.norec = pp.strukorderfk " & _
                     " LEFT JOIN strukpelayanan_t AS sp ON sp.norec = pp.strukfk " & _
                     " LEFT JOIN strukbuktipenerimaan_t AS sbm ON sbm.nostrukfk = pp.norec " & _
                     " INNER JOIN produk_m AS pro ON pro.id = pp.produkfk " & _
                     " INNER JOIN pasien_m AS pm ON pm.id = pd.nocmfk " & _
                     " LEFT JOIN jeniskelamin_m AS jk ON jk.id = pm.objectjeniskelaminfk " & _
                     " LEFT JOIN pegawai_m AS pg ON pg.id = so.objectpegawaiorderfk " & _
                     " LEFT JOIN pegawai_m AS pg1 ON pg1.id = hpl.pegawaifk " & _
                     " WHERE pp.norec = '" & noorder & "' "
            
            ReadRs2 strSQL
            Dim Umurs As String
           
            adoReport.CommandText = strSQL
            adoReport.CommandType = adCmdUnknown
            .database.AddADOCommand CN_String, adoReport
            If RS2.EOF = False Then
               'HEADER
                .txtNamaRs.SetText strNamaLengkapRs
                .txtAlamatRs.SetText stralmtLengkapRs
                .txtNamaKota.SetText strNamaKota & ", "
                .usNoRm.SetUnboundFieldSource ("if isnull({ado.nocm}) then """" else {ado.nocm} ")
                .usTglTerima.SetUnboundFieldSource ("if isnull({ado.tglterima}) then """" else {ado.tglterima} ")
                .usTglBayar.SetUnboundFieldSource ("if isnull({ado.tglbayar}) then """" else {ado.tglbayar} ")
                .usTglJawab.SetUnboundFieldSource ("if isnull({ado.tgljawab}) then """" else {ado.tgljawab} ")
                .usNamaPasien.SetUnboundFieldSource ("if isnull({ado.namapasien}) then """" else {ado.namapasien} ")
                .usJkUmur.SetUnboundFieldSource ("if isnull({ado.umur}) then """" else {ado.umur} ")
                .usDokterPengirim.SetUnboundFieldSource ("if isnull({ado.namalengkap}) then """" else {ado.namalengkap} ")
                .usTopografi.SetUnboundFieldSource ("if isnull({ado.topografi}) then """" else {ado.topografi} ")
                .usMorfologi.SetUnboundFieldSource ("if isnull({ado.morfologi}) then """" else {ado.morfologi} ")
                .usSitologi.SetUnboundFieldSource ("if isnull({ado.nomorpa}) then """" else {ado.nomorpa} ")
                .txtJudul.SetText "HASIL PEMERIKSAAN HISTOPATOLOGI"
               'HEADER
               'BODY
                 .txtDiagnosaKlinik.SetText IIf(IsNull(RS2("diagnosaklinik")), "-", Replace(RS2("diagnosaklinik"), "~", vbCrLf))
                 .txtKeteranganKlinik.SetText IIf(IsNull(RS2("keteranganklinik")), "-", Replace(RS2("keteranganklinik"), "~", vbCrLf))
                 .txtMakroskopik.SetText IIf(IsNull(RS2("makroskopik")), "-", Replace(RS2("makroskopik"), "~", vbCrLf))
                 .txtMikroskopik.SetText IIf(IsNull(RS2("mikroskopik")), "-", Replace(RS2("mikroskopik"), "~", vbCrLf))
                 .txtKesimpulan.SetText IIf(IsNull(RS2("kesimpulan")), "-", Replace(RS2("kesimpulan"), "~", vbCrLf))
                 .txtAnjuran.SetText IIf(IsNull(RS2("anjuran")), "-", Replace(RS2("anjuran"), "~", vbCrLf))
                 .txtDiagnosaPB.SetText IIf(IsNull(RS2("diagnosapb")), "-", Replace(RS2("diagnosapb"), "~", vbCrLf))
                 .txtKeteranganPb.SetText IIf(IsNull(RS2("keteranganpb")), "-", Replace(RS2("keteranganpb"), "~", vbCrLf))
                 .txtTopografi.SetText IIf(IsNull(RS2("topografi")), "-", Replace(RS2("topografi"), "~", vbCrLf))
                 .txtMorfologi.SetText IIf(IsNull(RS2("morfologi")), "-", Replace(RS2("morfologi"), "~", vbCrLf))
               'BODY
               'FOOTER
                .txtPenanggungJawab.SetText IIf(IsNull(RS2("namapenanggungjawab")), "-", RS2("namapenanggungjawab"))
                .txtNipPenanggungJawab.SetText IIf(IsNull(RS2("nippns")), "-", RS2("nippns"))
               'FOOTER
                    
        If view = "false" Then
            strPrinter1 = GetTxt("Setting.ini", "Printer", "HasilLaboratoriumHispatologi")
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
            End If
        
    End With
Exit Sub
errLoad:
End Sub
