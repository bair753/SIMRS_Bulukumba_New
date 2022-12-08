VERSION 5.00
Object = "{C4847593-972C-11D0-9567-00A0C9273C2A}#8.0#0"; "crviewer.dll"
Begin VB.Form frmLaporanPenerimaanPendaftaranKonsul 
   Caption         =   "Transmedic"
   ClientHeight    =   7005
   ClientLeft      =   60
   ClientTop       =   345
   ClientWidth     =   6990
   Icon            =   "frmLaporanPenerimaanPendaftaranKonsul.frx":0000
   LinkTopic       =   "Form1"
   ScaleHeight     =   7005
   ScaleWidth      =   6990
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
      TabIndex        =   2
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
      TabIndex        =   1
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
      TabIndex        =   0
      Top             =   480
      Width           =   3015
   End
   Begin CRVIEWERLibCtl.CRViewer CRViewer1 
      Height          =   7005
      Left            =   0
      TabIndex        =   3
      Top             =   0
      Width           =   7005
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
End
Attribute VB_Name = "frmLaporanPenerimaanPendaftaranKonsul"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Option Explicit
Dim ReportBaru As New crPenerimaanKasirPendaftaranKonsul
'Dim bolSuppresDetailSection10 As Boolean
'Dim ii As Integer
'Dim tempPrint1 As String
'Dim p As Printer
'Dim p2 As Printer
Dim strDeviceName As String
Dim strDriverName As String
Dim strPort As String

Private Sub cmdCetak_Click()
    ReportBaru.SelectPrinter "winspool", cboPrinter.Text, "Ne00:"
    'PrinterNama = cboPrinter.Text
    ReportBaru.PrintOut False
End Sub

Private Sub CmdOption_Click()
    ReportBaru.PrinterSetup Me.hwnd
    CRViewer1.Refresh
End Sub


Private Sub Form_Load()
    Dim p As Printer
    cboPrinter.Clear
    For Each p In Printers
        cboPrinter.AddItem p.DeviceName
    Next
    cboPrinter.Text = GetTxt("Setting.ini", "Printer", "LaporanPenerimaan")
End Sub

Private Sub Form_Resize()
    CRViewer1.Top = 0
    CRViewer1.Left = 0
    CRViewer1.Height = ScaleHeight
    CRViewer1.Width = ScaleWidth
End Sub

Private Sub Form_Unload(Cancel As Integer)

    Set frmLaporanPenerimaanPendaftaranKonsul = Nothing
End Sub

Public Sub Cetak(idKasir As String, tglAwal As String, tglAkhir As String, idPegawai As String, idDept As String, view As String)
'On Error GoTo errLoad
'On Error Resume Next
Set frmLaporanPenerimaanPendaftaranKonsul = Nothing
Dim adocmd As New ADODB.Command
    Dim str1 As String
    Dim str2 As String
    Dim str3 As String
    Dim str4 As String
    Dim str5 As String
    Dim nmaKasir As String
    Dim aingmacan As String
    Dim i As Integer
    str1 = ""
    If idPegawai <> "" Then
        str1 = " and pg.id in (" & idPegawai & ") "
        str2 = " WHERE pg.id in (" & idPegawai & ") "
'        str5 = "WHERE id in (" & idPegawai & ")"
    Else
        str1 = ""
        str2 = ""
    End If
    If idDept <> "" Then
        str4 = " and ru.objectdepartemenfk=" & idDept & " "
    End If
'    If idRuangan <> "" Then
'        str2 = " and apd.r=" & idRuangan & " "
'    End If
'    If idDokter <> "" Then
'        str3 = " and pg2.id=" & idDokter & " "
'    End If
    
Set ReportBaru = New crPenerimaanKasirPendaftaranKonsul
    
    strSQL = " SELECT xx.namaruangan,SUM(xx.jumlahpendaftaran) AS jumlahpendaftaran,SUM(xx.pendaftaran) AS pendaftaran,SUM(xx.dokter) AS dokter, " & _
             " 0 AS jmlpasienkonsul,0 AS jmldokterkonsul " & _
             " FROM(SELECT x.namaruangan,CASE WHEN x.pendaftaran <> 0 THEN COUNT(x.pendaftaran) ELSE 0 END AS jumlahpendaftaran, " & _
             " SUM(x.pendaftaran) AS pendaftaran, SUM(x.dokter) AS dokter " & _
             " FROM(SELECT ru.namaruangan,CASE WHEN pp.produkfk = 33625 THEN (pp.jumlah*(pp.harganetto-pp.hargadiscount)) ELSE 0 END AS pendaftaran,  " & _
             " CASE WHEN pp.produkfk in (28343,30111,30110,30168,30650,31206,31207,32361,32362,33630,30151,5001885,1002121482) THEN (pp.jumlah*(pp.harganetto-pp.hargadiscount)) ELSE 0 END AS dokter  " & _
             " FROM pelayananpasien_t AS pp " & _
             " INNER JOIN antrianpasiendiperiksa_t AS apd ON apd.norec = pp.noregistrasifk " & _
             " INNER JOIN pasiendaftar_t AS pd ON pd.norec = apd.noregistrasifk " & _
             " LEFT JOIN ruangan_m AS ru ON ru.id = apd.objectruanganfk " & _
             " INNER JOIN strukpelayanan_t AS sp ON sp.norec = pp.strukfk " & _
             " LEFT JOIN strukbuktipenerimaan_t AS sbm ON sbm.nostrukfk = sp.norec AND sbm.statusenabled = true " & _
             " LEFT JOIN loginuser_s AS lu ON lu.id = sbm.objectpegawaipenerimafk " & _
             " LEFT JOIN pegawai_m AS pg ON pg.id = lu.objectpegawaifk " & _
             " LEFT JOIN produk_m AS pr ON pr.id = pp.produkfk " & _
             " WHERE pd.objectkelompokpasienlastfk <> 2 and pp.strukresepfk IS NULL AND sbm.tglsbm BETWEEN '" & tglAwal & "' and '" & tglAkhir & "' " & _
             str1 & str4 & " ) as x " & _
             " GROUP BY x.namaruangan,x.pendaftaran) as xx " & _
             " GROUP BY xx.namaruangan"

'      strSQL = strSQL & " UNION ALL " & _
'               " select namaruangan,0 AS jumlahpendaftaran,0 AS pendaftaran,0 AS dokter,0 AS jmlpasienkonsul,0 AS jmldokterkonsul from ruangan_m where statusenabled=true and kdprofile=21 and objectdepartemenfk=18 "
        
       ReadRs2 "select namalengkap from pegawai_m " & str2
        If RS2.EOF = False Then
            For i = 0 To RS2.RecordCount - 1
                aingmacan = aingmacan & ", " & RS2!namalengkap
                RS2.MoveNext
            Next
        End If
        nmaKasir = Replace(aingmacan, ",", "", 1, 1)
    adocmd.CommandText = strSQL
    adocmd.CommandType = adCmdText
        
    With ReportBaru
        .database.AddADOCommand CN_String, adocmd
            .txtNamaRs.SetText strNamaLengkapRs
            .txtAlamatRs.SetText strAlamatRS & ", " & strKodePos & ", " & strNoTlpn & ", " & strNoFax
            .txtWebEmail.SetText strEmail & ", " & strWebSite
            .txtPeriode.SetText "Periode : " & tglAwal & " s/d " & tglAkhir & ""
            .usRuangan.SetUnboundFieldSource ("{ado.namaruangan}")
            .unJmlPendaftaranPasien.SetUnboundFieldSource IIf(IsNull("{ado.jumlahpendaftaran}") = True, "", ("{ado.jumlahpendaftaran}"))
            .unBiayaPendaftaran.SetUnboundFieldSource IIf(IsNull("{ado.pendaftaran}") = True, 0, ("{ado.pendaftaran}"))
            .unBiayaDokter.SetUnboundFieldSource IIf(IsNull("{ado.dokter}") = True, 0, ("{ado.dokter}"))
            .unJmlPasienKonsul.SetUnboundFieldSource IIf(IsNull("{ado.jmlpasienkonsul}") = True, 0, ("{ado.jmlpasienkonsul}"))
            .unBiayaKsl.SetUnboundFieldSource IIf(IsNull("{ado.jmldokterkonsul}") = True, 0, ("{ado.jmldokterkonsul}"))
            .usNamaKasir.SetText idKasir
            '            .usN.SetText idKasir
            .txtNamaKasirs.SetText nmaKasir
            If view = "false" Then
                Dim strPrinter As String
                strPrinter = GetTxt("Setting.ini", "Printer", "LaporanPenerimaanKasir")
                .SelectPrinter "winspool", strPrinter, "Ne00:"
                .PrintOut False
                Unload Me
            Else
                With CRViewer1
                    .ReportSource = ReportBaru
                    .ViewReport
                    .Zoom 1
                End With
                Me.Show
            End If
        'End If
    End With
Exit Sub
errLoad:
End Sub

