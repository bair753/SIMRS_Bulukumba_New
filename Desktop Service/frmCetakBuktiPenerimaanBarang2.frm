VERSION 5.00
Object = "{C4847593-972C-11D0-9567-00A0C9273C2A}#8.0#0"; "crviewer.dll"
Begin VB.Form frmCetakBuktiPenerimaanBarang2 
   Caption         =   "Transmedic"
   ClientHeight    =   7005
   ClientLeft      =   60
   ClientTop       =   345
   ClientWidth     =   9075
   Icon            =   "frmCetakBuktiPenerimaanBarang2.frx":0000
   LinkTopic       =   "Form1"
   ScaleHeight     =   7005
   ScaleWidth      =   9075
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
      Height          =   7005
      Left            =   0
      TabIndex        =   0
      Top             =   0
      Width           =   9045
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
Attribute VB_Name = "frmCetakBuktiPenerimaanBarang2"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Option Explicit
Dim ReportResep As New cr_BuktiPenerimaanBarang

Dim ii As Integer
Dim tempPrint1 As String
Dim p As Printer
Dim p2 As Printer
Dim strDeviceName As String
Dim strDriverName As String
Dim strPort As String

Dim bolStrukResep As Boolean


Dim strPrinter As String
Dim strPrinter1 As String
Dim PrinterNama As String

Dim adoReport As New ADODB.Command

Private Sub cmdCetak_Click()
  If cboPrinter.Text = "" Then MsgBox "Printer belum dipilih", vbInformation, ".: Information": Exit Sub
    If bolStrukResep = True Then
        ReportResep.SelectPrinter "winspool", cboPrinter.Text, "Ne00:"
        PrinterNama = cboPrinter.Text
        ReportResep.PrintOut False
    
    End If
End Sub

Private Sub CmdOption_Click()
    
    If bolStrukResep = True Then
        ReportResep.PrinterSetup Me.hwnd
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
    
End Sub

Private Sub Form_Resize()
    CRViewer1.Top = 0
    CRViewer1.Left = 0
    CRViewer1.Height = ScaleHeight
    CRViewer1.Width = ScaleWidth
End Sub

Private Sub Form_Unload(Cancel As Integer)

    Set frmCetakBuktiPenerimaanBarang2 = Nothing

End Sub

Public Sub Cetak(view As String, strNores As String, Penerima As String, Penyerah As String, pegawaiMengetahui As String, jabatan1 As String, jabatan2 As String, jabatanMengetahui As String, test As String, strUser As String)
'view As String, strNoKirim As String, pegawaiPenyerah As String, pegawaiMengetahui As String, pegawaiPenerima As String, JabatanPenyerah As String, jabatanMengetahui, JabatanPenerima As String, strUser As String
'On Error GoTo errLoad
Set frmCetakBuktiPenerimaanBarang2 = Nothing
Dim strSQL As String
Dim pegawai1, pegawai2, pegawai3, nip1, nip2, nip3 As String
bolStrukResep = True
    
    
        With ReportResep
            Set adoReport = New ADODB.Command
            adoReport.ActiveConnection = CN_String
            
            strSQL = " SELECT sp.nostruk,sp.nofaktur,to_char(sp.tglstruk, 'DD-MM-YYYY') AS tglstruk,sp.tglspk,to_char(sp.tglfaktur, 'DD-MM-YYYY') AS tglfaktur,to_char(sp.tglkontrak, 'DD-MM-YYYY') AS tglkontrak, " & _
                     " to_char(sr.tglrealisasi,'DD-MM-YYYY') AS tglrealisasi,CASE WHEN ap.asalproduk IS NULL THEN '-' ELSE ap.asalproduk END AS asalproduk, " & _
                     " CASE WHEN rk.namarekanan IS NULL THEN '-' ELSE rk.namarekanan END AS rekanan,pr.id AS idproduk,pr.namaproduk,ss.satuanstandar,CASE WHEN ru.namaruangan IS NULL THEN '-' ELSE ru.kdruangan || ' - ' || ru.namaruangan END AS gudang, " & _
                     " sp.keteranganambil,CASE WHEN sp.nokontrak IS NULL THEN '-' ELSE sp.nokontrak END AS nokontrak,CASE WHEN sp.nosppb IS NULL THEN '-' ELSE sp.nosppb END AS nosppb,spd.qtyproduk,spd.hargasatuan, " & _
                     " spd.persenppn,spd.persendiscount,spd.persenppn,spd.persendiscount,CAST((spd.qtyproduk*spd.hargasatuan) AS FLOAT) as subtotal, " & _
                     " CAST((((spd.persendiscount*spd.hargasatuan)/100)*spd.qtyproduk) AS FLOAT) AS diskon, " & _
                     " CAST((spd.persenppn*((spd.qtyproduk*spd.hargasatuan)-(((spd.persendiscount*spd.hargasatuan)/100)*spd.qtyproduk))/100) AS FLOAT) AS ppn, " & _
                     " CAST(((spd.qtyproduk*spd.hargasatuan)-(((spd.persendiscount*spd.hargasatuan)/100)*spd.qtyproduk))+(spd.persenppn*((spd.qtyproduk*spd.hargasatuan)-(((spd.persendiscount*spd.hargasatuan)/100)*spd.qtyproduk))/100) AS FLOAT) AS total " & _
                     " FROM strukpelayanan_t sp " & _
                     " LEFT JOIN strukpelayanandetail_t spd ON spd.nostrukfk = sp.norec " & _
                     " LEFT JOIN pegawai_m pg ON pg.id = sp.objectpegawaipenanggungjawabfk " & _
                     " LEFT JOIN ruangan_m ru ON ru.id = sp.objectruanganfk " & _
                     " LEFT JOIN produk_m pr ON pr.id = spd.objectprodukfk " & _
                     " LEFT JOIN asalproduk_m AS ap ON ap.id = spd.objectasalprodukfk " & _
                     " LEFT JOIN rekanan_m rk ON rk.id = sp.objectrekananfk " & _
                     " LEFT JOIN jeniskemasan_m jkm ON jkm.id = spd.objectjeniskemasanfk " & _
                     " LEFT JOIN satuanstandar_m ss ON ss.id = spd.objectsatuanstandarfk " & _
                     " LEFT JOIN riwayatrealisasi_t AS rr ON rr.penerimaanfk = sp.norec " & _
                     " LEFT JOIN strukrealisasi_t AS sr ON sr.norec = rr.objectstrukrealisasifk " & _
                     " WHERE sp.norec = '" & strNores & "'" & _
                     " GROUP BY sp.nostruk,sp.nofaktur,sp.tglstruk,sp.tglspk,tglfaktur,sp.tglkontrak, " & _
                     " ap.asalproduk,rk.kdrekanan,rk.namarekanan,ru.kdruangan,ru.namaruangan, " & _
                     " sp.tglstruk,sp.keteranganambil,pr.id,ss.satuanstandar,pr.namaproduk, " & _
                     " spd.qtyproduk,sp.nokontrak,sp.nosppb,sr.tglrealisasi,spd.persenppn, " & _
                     " spd.persendiscount , spd.hargasatuan "

             ReadRs strSQL
             If Penerima <> "" Then
            
               ReadRs2 "select pg.namalengkap,pg.nippns,jb.namajabatan " & _
                     "from pegawai_m as pg " & _
                     "left join jabatan_m as jb on jb.id = pg.objectjabatanstrukturalfk " & _
                     "where pg.id = '" & Penerima & "'"
                If RS2.EOF = False Then
                    pegawai1 = RS2!namalengkap
                    nip1 = "NIP. " & RS2!nippns
                Else
                    pegawai1 = "-"
                    nip1 = "NIP. -"
                End If
            Else
                    pegawai1 = "-"
                    nip1 = "NIP. -"
            End If
            
            If pegawaiMengetahui <> "" Then
                ReadRs4 "select pg.namalengkap,pg.nippns,jb.namajabatan " & _
                     "from pegawai_m as pg " & _
                     "left join jabatan_m as jb on jb.id = pg.objectjabatanstrukturalfk " & _
                     "where pg.id = '" & pegawaiMengetahui & "'"
                                            
                If RS4.EOF = False Then
                    pegawai3 = RS4!namalengkap
                    nip3 = "NIP. " & RS4!nippns
                Else
                    pegawai3 = "-"
                    nip3 = "NIP. -"
                End If
            Else
                pegawai3 = "-"
                nip3 = "NIP. -"
            End If
            
            If Penyerah <> "" Then
                            
                 ReadRs3 "select pg.namalengkap,pg.nippns,jb.namajabatan " & _
                     "from pegawai_m as pg " & _
                     "left join jabatan_m as jb on jb.id = pg.objectjabatanstrukturalfk " & _
                     "where pg.id = '" & Penyerah & "'"
                
               
                If RS3.EOF = False Then
                    pegawai2 = RS3!namalengkap
                    nip2 = "NIP. " & RS3!nippns
                Else
                    pegawai2 = "-"
                    nip2 = "NIP. -"
                End If
            Else
               pegawai2 = "-"
               nip2 = "NIP. -"
            End If
                        
            
             adoReport.CommandText = strSQL
             adoReport.CommandType = adCmdUnknown
            .database.AddADOCommand CN_String, adoReport

             .txtUser.SetText strUser
             .txtNamaRs.SetText strNamaLengkapRs
             .txtAlamatRs.SetText strAlamatRS & ", " & strKodePos & ", " & strNoTlpn & ", " & strNoFax
             .txtTelpFax.SetText strEmail & ", " & strWebSite

             .usTglSPk.SetUnboundFieldSource ("{Ado.tglrealisasi}")
             .usResep.SetUnboundFieldSource ("{Ado.nofaktur}")
             .usPemesanan.SetUnboundFieldSource ("{Ado.nostruk}")
             .usRekanan.SetUnboundFieldSource ("{Ado.rekanan}")
             .usNamaRuangan.SetUnboundFieldSource ("{Ado.gudang}")
             .usSumberDana.SetUnboundFieldSource ("{Ado.asalproduk}")
             .usNoSPK.SetUnboundFieldSource ("{Ado.nosppb}")
             .usNoKontrak.SetUnboundFieldSource ("{Ado.nokontrak}")
             .usTglDokumen.SetUnboundFieldSource ("{Ado.tglfaktur}")
             .udTglOrder.SetUnboundFieldSource ("{Ado.tglrealisasi}")
             .usTglKontrak.SetUnboundFieldSource ("{Ado.tglkontrak}")
             .usKeteranganAmbil.SetUnboundFieldSource ("{Ado.keteranganambil}")
             
             .usKdBarang.SetUnboundFieldSource ("{ado.idproduk}")
             .usNamaBarang.SetUnboundFieldSource ("{Ado.namaproduk}")
             .usSatuan.SetUnboundFieldSource ("{ado.satuanstandar}")
             .ucHarga.SetUnboundFieldSource ("{Ado.hargasatuan}")
             .unQty.SetUnboundFieldSource ("{Ado.qtyproduk}")
             .unDiskon.SetUnboundFieldSource ("{Ado.persendiscount}")
             .unPPN.SetUnboundFieldSource ("{Ado.persenppn}")
             .uucTotal.SetUnboundFieldSource ("{Ado.total}")
             .ucSubtotal.SetUnboundFieldSource ("{Ado.subtotal}")
             .ucTotalDiskon.SetUnboundFieldSource ("{Ado.diskon}")
             .ucTotalPPN.SetUnboundFieldSource ("{Ado.ppn}")
             
             .txtJabatan1.SetText jabatan1
             .txtJabatan2.SetText jabatan2
             .txtJabatan.SetText jabatanMengetahui
             
             .txtMengetahui.SetText pegawai3
             .txtPenyerahan.SetText pegawai1
             .txtPenerima.SetText pegawai2
             
             .txtNipMengetahui.SetText nip3
             .txtNipPenyerahan.SetText nip1
             .txtNipPenerima.SetText nip2
             
             '.udtanggal.SetUnboundFieldSource ("{Ado.tglstruk}")
             '.udtanggal.SetUnboundFieldSource ("{Ado.tglstruk}")
             '.udTglSPK.SetUnboundFieldSource ("{Ado.tglrealisasi}")
             '.ucTotalHarga.SetUnboundFieldSource ("{Ado.subtotal)")
             '.ucTotalBayar.SetUnboundFieldSource ("{Ado.totalharusdibayar}")
             '.udTglDokumen.SetUnboundFieldSource ("{Ado.tglfaktur}")
             '.tglKontrak.SetUnboundFieldSource ("{Ado.tglkontrak}")
             '.UnboundCurrency2.SetUnboundFieldSource ("{Ado.subtotal}")
             '.usPersenDiskon.SetUnboundFieldSource ("{Ado.persendiskon}")
             '.usPersenPpn.SetUnboundFieldSource ("{Ado.persenppn}")
            If view = "false" Then
                strPrinter1 = GetTxt("Setting.ini", "Printer", "Logistik_A4")
                .SelectPrinter "winspool", strPrinter1, "Ne00:"
                .PrintOut False
                Unload Me
                Screen.MousePointer = vbDefault
             Else
                With CRViewer1
                    .ReportSource = ReportResep
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

