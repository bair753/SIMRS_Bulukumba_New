VERSION 5.00
Object = "{C4847593-972C-11D0-9567-00A0C9273C2A}#8.0#0"; "crviewer.dll"
Begin VB.Form frmCetakLabelFarmasiOB 
   Caption         =   "Transmedic"
   ClientHeight    =   7215
   ClientLeft      =   60
   ClientTop       =   345
   ClientWidth     =   5790
   Icon            =   "frmCetakLabelFarmasiOB.frx":0000
   LinkTopic       =   "Form1"
   ScaleHeight     =   7215
   ScaleWidth      =   5790
   WindowState     =   2  'Maximized
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
      TabIndex        =   3
      Top             =   600
      Width           =   2775
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
      Left            =   3720
      TabIndex        =   2
      Top             =   600
      Width           =   975
   End
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
      Left            =   4680
      TabIndex        =   1
      Top             =   600
      Width           =   1095
   End
   Begin CRVIEWERLibCtl.CRViewer CRViewer1 
      Height          =   7215
      Left            =   0
      TabIndex        =   0
      Top             =   0
      Width           =   5775
      DisplayGroupTree=   -1  'True
      DisplayToolbar  =   -1  'True
      EnableGroupTree =   -1  'True
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
      EnableSelectExpertButton=   0   'False
      EnableToolbar   =   -1  'True
      DisplayBorder   =   -1  'True
      DisplayTabs     =   -1  'True
      DisplayBackgroundEdge=   -1  'True
      SelectionFormula=   ""
      EnablePopupMenu =   -1  'True
      EnableExportButton=   0   'False
      EnableSearchExpertButton=   0   'False
      EnableHelpButton=   0   'False
   End
End
Attribute VB_Name = "frmCetakLabelFarmasiOB"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Option Explicit
Dim Report As New Cr_cetakLabelKecil
'Dim bolSuppresDetailSection10 As Boolean
'Dim ii As Integer
'Dim tempPrint1 As String
'Dim p As Printer
'Dim p2 As Printer
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
    cboPrinter.Text = GetTxt("Setting.ini", "Printer", "LabelFarmasi")
End Sub

Private Sub Form_Resize()
    CRViewer1.Top = 0
    CRViewer1.Left = 0
    CRViewer1.Height = ScaleHeight
    CRViewer1.Width = ScaleWidth
End Sub

Private Sub Form_Unload(Cancel As Integer)

    Set frmCetakLabelFarmasiOB = Nothing
End Sub

Public Sub CetakLabelFarmasiOB(norec As String, view As String)
'On Error GoTo errLoad
'On Error Resume Next
    Dim str1 As String
    
    If norec <> "" Then
        str1 = "sp.norec='" & norec & " '"
    End If
Set frmCetakLabelFarmasiOB = Nothing
Dim adocmd As New ADODB.Command
    
Set Report = New Cr_cetakLabelFarmasi
    strSQL = "select sp.namapasien_klien as namapasien,ps.tgllahir,sp.nostruk as noresep,sp.tglstruk as tglresep, sp.nostruk_intern as nocm, " & _
            "pr.namaproduk,spd.aturanpakai,spd.resepke as rke from strukpelayanan_t as sp inner join strukpelayanandetail_t as spd on sp.norec= spd.nostrukfk " & _
            "inner JOIN produk_m as pr on pr.id=spd.objectprodukfk " & _
            "left JOIN jeniskemasan_m as jkm on jkm.id=spd.objectjeniskemasanfk " & _
            "left join pasien_m as ps on ps.nocm= sp.nostruk_intern " & _
            "where spd.objectjeniskemasanfk in (1,2) and " & _
            str1 & _
            ""
    'strSQL = strSQL & " union all select distinct ps.namapasien, ps.tgllahir, sr.noresep, sr.tglresep,'Racikan' as namaproduk, pp.aturanpakai,pp.rke " & _
           ' "from strukresep_t as sr  " & _
            '"inner join pelayananpasien_t as pp on sr.norec= pp.strukresepfk " & _
           ' "inner join antrianpasiendiperiksa_t as apd on apd.norec = sr.pasienfk " & _
           ' "inner join pasiendaftar_t as pd on pd.norec=apd.noregistrasifk " & _
           ' "inner join pasien_m as ps on ps.id = pd.nocmfk " & _
           ' "where pp.jeniskemasanfk =1 and " & _
           ' str1 & _
           ' ""
   
    adocmd.CommandText = strSQL
    adocmd.CommandType = adCmdText
        
    With Report
        .database.AddADOCommand CN_String, adocmd
            .udtTglResep.SetUnboundFieldSource ("{ado.tglresep}")
            .usNoResep.SetUnboundFieldSource ("{ado.noresep}")
            .usNamaPasien.SetUnboundFieldSource ("{ado.namapasien}")
            .udtTglLahir.SetUnboundFieldSource ("{ado.tgllahir}")
            .usNamaProduk.SetUnboundFieldSource ("{ado.namaproduk}")
'            .Usaturanpaka.SetUnboundFieldSource ("{ado.aturanpakai}")
            
'            If view = "false" Then
                Dim strPrinter As String
'
                strPrinter = GetTxt("Setting.ini", "Printer", "LabelFarmasi")
                .SelectPrinter "winspool", strPrinter, "Ne00:"
                .PrintOut False
                Unload Me
'            Else
'                With CRViewer1
'                    .ReportSource = Report
'                    .ViewReport
'                    .Zoom 1
'                End With
'                Me.Show
'            End If
        'End If
    End With
Exit Sub
errLoad:
End Sub
Public Sub CetakLabelFarmasiOBKecil(norec As String, view As String)
'On Error GoTo errLoad
'On Error Resume Next
Dim adocmd As New ADODB.Command
Dim str1, str2 As String
Dim Apoteker As String
Set frmCetakLabelFarmasiKecil = Nothing

If norec <> "" Then
    str1 = " sp.norec = '" & norec & "'"
    ReadRs2 "select pg.namalengkap from logginguser_t as lg " & _
            "INNER JOIN loginuser_s as lu on lu.id = lg.objectloginuserfk " & _
            "INNER JOIN pegawai_m as pg on pg.id = lu.objectpegawaifk " & _
            "where lg.noreff = '" & norec & "'"
End If

If RS2.EOF = False Then
   Apoteker = "Apoteker : " & RS2!namalengkap
Else
   Apoteker = "Apoteker : -"
End If
    
'    If norecDetail <> "" Then
'        str2 = " and sr.norec='" & norec & "'"
'    End If
    
Set Report = New Cr_cetakLabelKecil
    strSQL = " SELECT sp.namapasien_klien AS namapasien,CASE WHEN sp.tglfaktur IS NULL THEN '' ELSE to_char(sp.tglfaktur, 'DD-MM-YYYY') END AS tgllahir,sp.nostruk AS noresep, " & _
             " to_char(sp.tglstruk, 'DD-MM-YYYY') AS tglresep,sp.nostruk_intern AS nocm,pr.namaproduk || ' (' || spd.qtyproduk || ' )' AS namaproduk,spd.aturanpakai, " & _
             " CASE WHEN sp.namatempattujuan IS NULL THEN '-' ELSE sp.namatempattujuan END AS alamat, " & _
             " spd.resepke AS rke,CASE WHEN spd.issiang = 't' THEN 'Siang' END AS siang, " & _
             " CASE WHEN spd.ispagi = 't' THEN 'Pagi' END AS pagi, " & _
             " CASE WHEN spd.ismalam = 't' THEN 'Malam' ELSE '-' END AS malam, " & _
             " CASE WHEN spd.issore = 't' THEN 'Sore' ELSE '-' END AS sore, " & _
             " spd.qtyproduk AS jumlah,ss.satuanstandar, " & _
             " CASE WHEN spd.tglkadaluarsa IS NULL THEN '' ELSE to_char(spd.tglkadaluarsa,'DD-MM-YYYY HH:mm') END AS tglkadaluarsa,CASE WHEN spd.satuanresepfk IS NULL THEN ss.satuanstandar ELSE sn.satuanresep END AS satuanresep, " & _
             " '' AS keteranganpakai " & _
             " FROM strukpelayanan_t AS sp " & _
             " INNER JOIN strukpelayanandetail_t AS spd ON sp.norec = spd.nostrukfk " & _
             " INNER JOIN satuanstandar_m AS ss ON ss. ID = spd.objectsatuanstandarfk " & _
             " INNER JOIN produk_m AS pr ON pr. ID = spd.objectprodukfk " & _
             " LEFT JOIN jeniskemasan_m AS jkm ON jkm. ID = spd.objectjeniskemasanfk " & _
             " LEFT JOIN pasien_m AS ps ON ps.nocm = sp.nostruk_intern " & _
             " LEFT JOIN satuanresep_m AS sn ON sn.id = spd.satuanresepfk " & _
             " WHERE spd.objectjeniskemasanfk = 2 and spd.objectprodukfk <> 10013803 AND " & _
             str1 & _
             ""
    strSQL = strSQL & " UNION ALL " & _
             " SELECT sp.namapasien_klien AS namapasien,CASE WHEN sp.tglfaktur IS NULL THEN '' ELSE to_char(sp.tglfaktur, 'DD-MM-YYYY') END AS tgllahir, " & _
             " sp.nostruk AS noresep,to_char(sp.tglstruk, 'DD-MM-YYYY') AS tglresep, " & _
             " sp.nostruk_intern AS nocm,'rke-' || CAST (spd.resepke AS VARCHAR) || ' Racikan' || ' (' || ((spd.qtydetailresep / spd.dosis) * CASE WHEN pr.kekuatan IS NULL THEN 1 ELSE CAST(pr.kekuatan AS INTEGER) END) || ' )' AS namaproduk, " & _
             " spd.aturanpakai,CASE WHEN sp.namatempattujuan IS NULL THEN '-' ELSE sp.namatempattujuan END AS alamat, " & _
             " spd.resepke AS rke,CASE WHEN spd.issiang = 't' THEN 'Siang' END AS siang, " & _
             " CASE WHEN spd.ispagi = 't' THEN 'Pagi' END AS pagi, " & _
             " CASE WHEN spd.ismalam = 't' THEN 'Malam' ELSE '-' END AS malam, " & _
             " CASE WHEN spd.issore = 't' THEN 'Sore' ELSE '-' END AS sore, " & _
             " ((spd.qtydetailresep / spd.dosis) * CASE WHEN pr.kekuatan IS NULL THEN 1 ELSE CAST(pr.kekuatan AS INTEGER) END) AS jumlah, " & _
             " ss.satuanstandar,CASE WHEN spd.tglkadaluarsa IS NULL THEN '' ELSE to_char(spd.tglkadaluarsa,'DD-MM-YYYY HH:mm') END AS tglkadaluarsa,CASE WHEN spd.satuanresepfk IS NULL THEN '' ELSE sn.satuanresep END AS satuanresep, " & _
             " '' AS keteranganpakai " & _
             " FROM strukpelayanan_t AS sp " & _
             " INNER JOIN strukpelayanandetail_t AS spd ON sp.norec = spd.nostrukfk " & _
             " INNER JOIN satuanstandar_m AS ss ON ss.id = spd.objectsatuanstandarfk " & _
             " INNER JOIN produk_m AS pr ON pr. ID = spd.objectprodukfk " & _
             " LEFT JOIN jeniskemasan_m AS jkm ON jkm.id = spd.objectjeniskemasanfk " & _
             " LEFT JOIN pasien_m AS ps ON ps.nocm = sp.nostruk_intern " & _
             " LEFT JOIN satuanresep_m AS sn ON sn.id = spd.satuanresepfk " & _
             " WHERE spd.objectjeniskemasanfk = 1 and spd.objectprodukfk <> 10013803 AND " & _
             str1 & _
             ""
            
    
    ReadRs3 strSQL
    adocmd.CommandText = strSQL
    adocmd.CommandType = adCmdText
    Dim aturan() As String
        
    With Report
        .database.AddADOCommand CN_String, adocmd
        If RS3.EOF = False Then
            .txtNamaRs.SetText strNamaLengkapRs
            .txtAlamatRs.SetText strAlamatRS
            .udtTglResep.SetUnboundFieldSource ("{ado.tglresep}")
            .usNoResep.SetUnboundFieldSource ("{ado.noresep}")
            .usNamaPasien.SetUnboundFieldSource ("{ado.namapasien}")
            .udtTglLahir.SetUnboundFieldSource ("{ado.tgllahir}")
            .usNoCm.SetUnboundFieldSource ("{ado.nocm}")
            .usAlamat.SetUnboundFieldSource ("{ado.alamat}")
            .usNamaProduk.SetUnboundFieldSource ("{ado.namaproduk}")
            .usCaraPakai.SetUnboundFieldSource ("{ado.aturanpakai}")
            .usaturan.SetUnboundFieldSource ("{ado.aturanpakai}")
            .usss.SetUnboundFieldSource ("{ado.satuanresep}")
            .usWaktuMinumS.SetUnboundFieldSource ("{ado.siang}")
            .usWaktuMinumM.SetUnboundFieldSource ("{ado.malam}")
            .usWaktuMinumP.SetUnboundFieldSource ("{ado.pagi}")
            .usWaktuMinumSr.SetUnboundFieldSource ("{ado.sore}")
            .usTglExp.SetUnboundFieldSource ("{ado.tglkadaluarsa}")
'           .usKeteranganPakai.SetUnboundFieldSource ("{ado.keteranganpakai}")
'            .udtTglKadaluarsa.SetUnboundFieldSource ("{ado.tglkadaluarsa}")
'            .txtTglExp.SetText IIf(IsNull(RS3("tglkadaluarsa")), "-", RS3("tglkadaluarsa"))
        view = True
            If view = "false" Then
                 Dim strPrinter As String
                 strPrinter = GetTxt("Setting.ini", "Printer", "LabelFarmasi")
                .SelectPrinter "winspool", strPrinter, "Ne00:"
                .PrintOut False
                Unload Me
'        End If
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

