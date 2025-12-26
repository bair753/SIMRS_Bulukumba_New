VERSION 5.00
Object = "{C4847593-972C-11D0-9567-00A0C9273C2A}#8.0#0"; "crviewer.dll"
Begin VB.Form frmCetakBuktiLayananFarmasi 
   Caption         =   "Transmedic"
   ClientHeight    =   7005
   ClientLeft      =   60
   ClientTop       =   345
   ClientWidth     =   9075
   Icon            =   "frmCetakBuktiLayananFarmasi.frx":0000
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
Attribute VB_Name = "frmCetakBuktiLayananFarmasi"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Option Explicit
Dim ReportResep As New cr_RincianBiayaResep_4

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

    Set frmCetakBuktiLayananFarmasi = Nothing

End Sub

Public Sub cetakStrukResep(strNores As String, view As String, strUser As String, counterId As String)
'On Error GoTo errLoad
Set frmCetakBuktiLayananFarmasi = Nothing
Dim strSQL As String
Dim strSQL2 As String
bolStrukResep = True
    
    
        With ReportResep
            Set adoReport = New ADODB.Command
            adoReport.ActiveConnection = CN_String
            
            If Left(strNores, 10) = "NonLayanan" Then
                strNores = Replace(strNores, "NonLayanan", "")
                    
'                strSQL = "select sp.nostruk as noresep, '-' as noregistrasi,sp.nostruk_intern as nocm,tglfaktur as tglregistrasi, sp.tglstruk as tgl, " & _
'                        "sp.namapasien_klien as namapasienjk,pg.namalengkap,'-' as alergi,sp.noteleponfaks,sp.namatempattujuan as alamat, " & _
'                        "ru.namaruangan,ru.namaruangan as ruanganpasien,'-' as kamar,'-' as bed, sp.namarekanan as penjamin,'' as Umur,sp.tglfaktur as tgllahir,((spd.hargasatuan-spd.hargadiscount)*spd.qtyproduk)+spd.hargatambahan as totalharga, " & _
'                        "((spd.hargasatuan-spd.hargadiscount)*spd.qtyproduk)+spd.hargatambahan as totalbiaya, " & _
'                        "pr.id as kdproduk, pr.namaproduk as namaprodukstandar, spd.qtyproduk as qtyhrg,spd.qtyproduk as jumlah, " & _
'                        "CASE when spd.hargadiscount is null then 0 ELSE  spd.hargadiscount * spd.qtyproduk end as totaldiscound, " & _
'                        "spd.resepke as rke,jkm.jeniskemasan,spd.qtyproduk as qtydetailresep,spd.qtydetailresep " & _
'                        "from strukpelayanan_t sp " & _
'                        "INNER JOIN strukpelayanandetail_t spd on spd.nostrukfk=sp.norec " & _
'                        "left JOIN pegawai_m pg on pg.id=sp.objectpegawaipenanggungjawabfk " & _
'                        "left JOIN ruangan_m ru on ru.id=sp.objectruanganfk " & _
'                        "left JOIN produk_m pr on pr.id=spd.objectprodukfk " & _
'                        "left JOIN jeniskemasan_m jkm on jkm.id=spd.objectjeniskemasanfk " & _
'                        "where sp.norec = '" & strNores & "'"
                 strSQL = " select sp.nostruk as noresep, '-' as noregistrasi,sp.nostruk_intern as nocm,tglfaktur as tglregistrasi, sp.tglstruk as tgl, " & _
                          " sp.namapasien_klien as namapasienjk,'Umum/Pribadi' AS kelompokpasien,pg.namalengkap,'-' as alergi,sp.noteleponfaks,sp.namatempattujuan as alamat, " & _
                          " ru.namaruangan,ru.namaruangan as ruanganpasien,'-' as kamar,'-' as bed, sp.namarekanan as penjamin,'' as Umur,to_char(sp.tglfaktur,'DD-MM-YYYY') AS tgllahir,((spd.hargasatuan-spd.hargadiscount)*spd.qtyproduk)+spd.hargatambahan as totalharga, " & _
                          " ((spd.hargasatuan-spd.hargadiscount)*spd.qtyproduk)+spd.hargatambahan as totalbiaya, " & _
                          " pr.id as kdproduk, pr.namaproduk as namaprodukstandar, spd.qtyproduk as qtyhrg,spd.qtyproduk as jumlah, " & _
                          " CASE when spd.hargadiscount is null then 0 ELSE  spd.hargadiscount * spd.qtyproduk end as totaldiscound, " & _
                          " CASE when spd.hargatambahan is null then 0 ELSE  spd.hargatambahan end as jasa, " & _
                          " CASE when spd.hargadiscount is null then 0 ELSE  spd.hargadiscount end as diskon, " & _
                          " (spd.hargasatuan*spd.qtyproduk) as total, " & _
                          " spd.resepke as rke,jkm.jeniskemasan,spd.qtyproduk as qtydetailresep,spd.qtydetailresep,to_char(sp.tglstruk,'DD-MM-YYYY') AS tglresept " & _
                          " from strukpelayanan_t sp " & _
                          " INNER JOIN strukpelayanandetail_t spd on spd.nostrukfk=sp.norec " & _
                          " left JOIN pegawai_m pg on pg.id=sp.objectpegawaipenanggungjawabfk " & _
                          " left JOIN ruangan_m ru on ru.id=sp.objectruanganfk " & _
                          " left JOIN produk_m pr on pr.id=spd.objectprodukfk " & _
                          " left JOIN jeniskemasan_m jkm on jkm.id=spd.objectjeniskemasanfk " & _
                          " where sp.norec = '" & strNores & "' and spd.objectprodukfk <> 10013803 "
                          
                strSQL2 = " select sum(hargasatuan) as jasa from strukpelayanandetail_t where nostrukfk =  '" & strNores & "' AND objectprodukfk = 10013803 "
            Else
                strSQL = " SELECT pd.noregistrasi,ps.nocm,'(' || EXTRACT(YEAR FROM AGE(to_date(to_char(pd.tglregistrasi,'YYYY-MM-DD'),'YYYY-MM-DD'),to_date(to_char(ps.tgllahir,'YYYY-MM-DD'),'YYYY-MM-DD'))) || ' Thn ' || EXTRACT(MONTH FROM AGE(to_date(to_char(pd.tglregistrasi,'YYYY-MM-DD'),'YYYY-MM-DD'),to_date(to_char(ps.tgllahir,'YYYY-MM-DD'),'YYYY-MM-DD'))) || ' Bln ' || EXTRACT(MONTH FROM AGE(to_date(to_char(pd.tglregistrasi,'YYYY-MM-DD'),'YYYY-MM-DD'),to_date(to_char(ps.tgllahir,'YYYY-MM-DD'),'YYYY-MM-DD'))) || ' Hr)' AS umur,ps.namapasien || ' ( ' || jk.reportdisplay || ' )' AS namapasienjk,kpp.kelompokpasien, " & _
                         " kpp.kelompokpasien || ' ( ' || rek.namarekanan || ' ) ' AS penjamin,ps.nohp AS noteleponfaks, " & _
                         " al.alamatlengkap AS alamat,to_char(ps.tgllahir,'DD-MM-YYYY') AS tgllahir,pd.tglregistrasi,ru.namaruangan AS ruanganpasien, " & _
                         " '-' AS alergi,sr.noresep,ru2.namaruangan,pp.tglpelayanan AS tgl,pp.rke,pr. ID AS kdproduk, " & _
                         " pr.namaproduk || ' / ' || sstd.satuanstandar AS namaprodukstandar,pp.jumlah, CASE WHEN pp.jasa IS NULL THEN 0 ELSE pp.jasa END AS jasa,pp.hargasatuan, " & _
                         " pp.jumlah AS qtyhrg,(pp.jumlah * (pp.hargasatuan-(case when pp.hargadiscount is null then 0 else pp.hargadiscount end )) )+case when pp.jasa is null then 0 else pp.jasa end as totalharga,jnskem.jeniskemasan,pgw.namalengkap, " & _
                         " CASE WHEN pp.hargadiscount IS NULL THEN 0 ELSE pp.hargadiscount * pp.jumlah END AS totaldiscound, CASE when pp.jasa is null then 0 ELSE pp.jasa end as jasa, " & _
                         " CASE when pp.hargadiscount is null then 0 ELSE  pp.hargadiscount end as diskon,(pp.hargasatuan*pp.jumlah) as total, " & _
                         " ((pp.jumlah * pp.hargasatuan ) - (CASE when pp.hargadiscount isnull then 0 ELSE  pp.hargadiscount * pp.jumlah end))+case when pp.jasa is null then 0 else pp.jasa end as totalbiaya,pp.qtydetailresep,to_char(sr.tglresep,'DD-MM-YYYY') AS tglresept " & _
                         " FROM pelayananpasien_t AS pp " & _
                         " INNER JOIN antrianpasiendiperiksa_t AS apdp ON pp.noregistrasifk = apdp.norec " & _
                         " INNER JOIN pasiendaftar_t AS pd ON apdp.noregistrasifk = pd.norec " & _
                         " INNER JOIN pasien_m AS ps ON pd.nocmfk = ps.id " & _
                         " left join alamat_m as al on al.nocmfk=ps.id " & _
                         " INNER JOIN produk_m AS pr ON pp.produkfk = pr.id " & _
                         " INNER JOIN ruangan_m AS ru ON apdp.objectruanganfk = ru.id " & _
                         " INNER JOIN strukresep_t AS sr ON pp.strukresepfk = sr.norec " & _
                         " INNER JOIN ruangan_m AS ru2 ON sr.ruanganfk = ru2.id " & _
                         " INNER JOIN jeniskemasan_m AS jnskem ON pp.jeniskemasanfk = jnskem.id " & _
                         " INNER JOIN pegawai_m AS pgw ON sr.penulisresepfk = pgw.id " & _
                         " INNER JOIN satuanstandar_m AS sstd ON pp.satuanviewfk = sstd.id " & _
                         " INNER JOIN jeniskelamin_m AS jk ON ps.objectjeniskelaminfk = jk.id " & _
                         " INNER JOIN kelompokpasien_m AS kpp ON pd.objectkelompokpasienlastfk = kpp.id " & _
                         " left JOIN rekanan_m as rek on rek.id=pd.objectrekananfk " & _
                         " WHERE sr.norec='" & strNores & "' and pp.produkfk <> 10013803 "
                         
                strSQL2 = " select sum(hargajual) as jasa from pelayananpasien_t where strukresepfk =  '" & strNores & "' AND produkfk = 10013803 "
            End If
            
            ReadRs strSQL
            ReadRs3 strSQL2
            
'            ReadRs2 "select TOP 1 cast(km.namakamar as VARCHAR) + ' / No. ' + cast(tt.nomorbed as VARCHAR) AS kamar " & _
'                    "from pasiendaftar_t as pd " & _
'                    "inner join antrianpasiendiperiksa_t as apdp on apdp.noregistrasifk = pd.norec " & _
'                    "inner join kamar_m as km on km.id=apdp.objectkamarfk inner join tempattidur_m as tt on tt.objectkamarfk=km.id " & _
'                    "where pd.noregistrasi= '" & (RS("noregistrasi")) & "'"
             
             
             adoReport.CommandText = strSQL
             adoReport.CommandType = adCmdUnknown
            .database.AddADOCommand CN_String, adoReport
            .txtNamaRs.SetText strNamaLengkapRs
            .txtAlamatRs.SetText strAlamatRS & ", " & strKodePos
            .txtTelpFax.SetText strNoTlpn & ", " & strNoFax
            .txtNamaUser.SetText strUser
             If Not rs.EOF Then
                     ReadRs2 "select cast(km.namakamar as VARCHAR) || ' / No. ' || cast(tt.nomorbed as VARCHAR) AS kamar " & _
                             "from pasiendaftar_t as pd " & _
                             "inner join antrianpasiendiperiksa_t as apdp on apdp.noregistrasifk = pd.norec " & _
                             "inner join kamar_m as km on km.id=apdp.objectkamarfk inner join tempattidur_m as tt on tt.objectkamarfk=km.id " & _
                             "where pd.noregistrasi= '" & (rs("noregistrasi")) & "' limit 1"
                    
                     .txtNoPendaftaran.SetText IIf(IsNull(rs("noregistrasi")), "-", rs("noregistrasi")) 'RS("noregistrasi")
                     .txtNocm.SetText IIf(IsNull(rs("nocm")), "-", rs("nocm"))
                     .txtnmpasien.SetText IIf(IsNull(rs("namapasienjk")), "-", rs("namapasienjk")) 'RS("namapasienjk")
                     '.txtklpkpasien.SetText RS("kelompokpasien")
                     '.txtPenjamin.SetText IIf(isnull(RS("NamaPenjamin")), "Sendiri", RS("NamaPenjamin"))
                     .txtNamaRuangan.SetText IIf(IsNull(rs("ruanganpasien")), "-", rs("ruanganpasien")) 'RS("ruanganpasien")
                     .txtKelompokPasien.SetText IIf(IsNull(rs("kelompokpasien")), "-", rs("kelompokpasien"))
                     .txtalamat.SetText IIf(IsNull(rs("alamat")), "-", rs("alamat"))
                     .txtJenisPasien.SetText IIf(IsNull(rs("penjamin")), "-", rs("penjamin"))
                     .txtTglRsp.SetText IIf(IsNull(rs("tglresept")), "-", rs("tglresept"))
'                     .txtTglresep.SetText IIf(IsNull(rs("tglresept")), "-", rs("tglresept"))
'                     .txtNamaRuanganFarmasi.SetText IIf(IsNull(rs("namaruangan")), "-", rs("namaruangan")) 'RS("namaruangan")
'                        If IsNull(rs("penjamin")) = True Then
'                            .txtPenjamin.SetText "-"
'                        Else
'                            .txtPenjamin.SetText rs("penjamin")
'                        End If
'                         If rs("umur") = "-" Then
'                            .txtUmur.SetText "-"
'                         Else
'                            .txtUmur.SetText hitungUmur(Format(rs("tgllahir"), "dd/mm/yyyy"), Format(rs("tglregistrasi"), "dd/mm/yyyy"))
'                         End If
                         .txtNamaDokter.SetText IIf(IsNull(rs("namalengkap")), "-", rs("namalengkap")) 'RS("namalengkap")
'                         .txtuser.SetText strUser
'                        If Left(rs("noresep"), 2) = "OB" Then
'                            .txtTglLahir.SetText IIf(IsNull(Format(rs("tgllahir"), "dd/mm/yyyy")), "-", Format(rs("tgllahir"), "dd/mm/yyyy")) 'RS!tgllahir
'                            .txtTelp2.SetText IIf(IsNull(rs("noteleponfaks")), "-", rs("noteleponfaks")) 'RS!noteleponfaks
'                            .txtAl2.SetText IIf(IsNull(rs("alamat")), "-", rs("alamat")) 'RS!alamat
'                            .txtTgl.SetText IIf(IsNull(Format(rs("tgl"), "dd/mm/yyyy HH:mm:ss")), "-", Format(rs("tgl"), "dd/mm/yyyy HH:mm:ss")) 'RS!tgl
'                        Else
'                            .txtTglLahir.SetText IIf(IsNull(rs("tgllahir")), "-", rs("tgllahir")) 'RS!tgllahir
'                            .txtTelp2.SetText IIf(IsNull(rs("noteleponfaks")), "-", rs("noteleponfaks")) 'RS!noteleponfaks
'                            .txtAl2.SetText IIf(IsNull(rs("alamat")), "-", rs("alamat")) 'RS!alamat
'                             If Not rs.EOF Then
'                                 If RS2.RecordCount > 0 Then
'                                    .txtKamar.SetText IIf(IsNull(RS2("kamar")), "-", RS2("kamar")) 'RS!noteleponfaks
'                                End If
''                             End If
'                            .txtTgl.SetText IIf(IsNull(Format(rs("tgl"), "dd/mm/yyyy HH:mm:ss")), "-", Format(rs("tgl"), "dd/mm/yyyy HH:mm:ss")) 'RS!tgl
'                            .txtAlergi.SetText IIf(IsNull(rs("alergi")), "-", rs("alergi")) 'RS!alergi
            
'                        End If
            End If
'            .txtCounterId.SetText counterId
           '  .usSatuan.SetUnboundFieldSource ("{ado.SatuanJmlK}")
          '   .udtanggal.SetUnboundFieldSource ("{Ado.tglpelayanan}")
             .usNoResep.SetUnboundFieldSource ("{Ado.noresep}")
             .ucbiayasatuan.SetUnboundFieldSource ("{Ado.totalharga}")
             .usTglLahir.SetUnboundFieldSource ("{Ado.tgllahir}")
    '2         .ucHrgSatuan.SetUnboundFieldSource ("{Ado.hargasatuan}")
'             .uskdproduk.SetUnboundFieldSource ("{Ado.kdproduk}")
             .ustindakan.SetUnboundFieldSource ("{Ado.namaprodukstandar}")
             .usQtyHrg.SetUnboundFieldSource ("{Ado.qtyhrg}")
             .unQtyTotal.SetUnboundFieldSource ("{Ado.jumlah}")
             .ucGrandTotal.SetUnboundFieldSource ("{Ado.total}") '("{Ado.totalharga}")
             .unJasa.SetUnboundFieldSource ("{Ado.jasa}")
             .unDiskon.SetUnboundFieldSource ("{Ado.diskon}")
             .undis.SetUnboundFieldSource ("{Ado.totaldiscound}")
             .unTotal.SetUnboundFieldSource ("{Ado.totalbiaya}")
             .unQtyDetail.SetUnboundFieldSource ("{ado.qtydetailresep}")
             .unRacikanKe.SetUnboundFieldSource ("{ado.rke}")
             .usJenisObat.SetUnboundFieldSource ("{ado.jeniskemasan}")
             If Not RS3.EOF Then
                .txtJasa.SetText IIf(IsNull(RS3("jasa")), 0, Format(RS3("jasa"), "##,##0.00"))
             End If
                                     
            If view = "false" Then
                strPrinter1 = GetTxt("Setting.ini", "Printer", "CetakResep")
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

Public Sub cetakStrukResepOK(strNores As String, view As String, strUser As String, counterId As String)
'On Error GoTo errLoad'
Set frmCetakBuktiLayananFarmasi = Nothing
Dim strSQL As String

bolStrukResep = True
    
    
        With ReportResep
            Set adoReport = New ADODB.Command
            adoReport.ActiveConnection = CN_String
            
'            strSQL = " SELECT pd.noregistrasi,ps.nocm,'(' || EXTRACT(YEAR FROM AGE(to_date(to_char(pd.tglregistrasi,'YYYY-MM-DD'),'YYYY-MM-DD'),to_date(to_char(ps.tgllahir,'YYYY-MM-DD'),'YYYY-MM-DD'))) || ' Thn ' || EXTRACT(MONTH FROM AGE(to_date(to_char(pd.tglregistrasi,'YYYY-MM-DD'),'YYYY-MM-DD'),to_date(to_char(ps.tgllahir,'YYYY-MM-DD'),'YYYY-MM-DD'))) || ' Bln ' || EXTRACT(MONTH FROM AGE(to_date(to_char(pd.tglregistrasi,'YYYY-MM-DD'),'YYYY-MM-DD'),to_date(to_char(ps.tgllahir,'YYYY-MM-DD'),'YYYY-MM-DD'))) || ' Hr)' AS umur,ps.namapasien || ' ( ' || jk.reportdisplay || ' )' AS namapasienjk,kpp.kelompokpasien, " & _
'                         " kpp.kelompokpasien || ' ( ' || rek.namarekanan || ' ) ' AS penjamin,ps.nohp AS noteleponfaks, " & _
'                         " al.alamatlengkap AS alamat,ps.tgllahir,pd.tglregistrasi,ru.namaruangan AS ruanganpasien, " & _
'                         " '-' AS alergi,sr.noresep,ru2.namaruangan,pp.tglpelayanan AS tgl,pp.rke,pr. ID AS kdproduk, " & _
'                         " pr.namaproduk || ' / ' || sstd.satuanstandar AS namaprodukstandar,pp.jumlah, " & _
'                         " CASE WHEN pp.jasa IS NULL THEN 0 ELSE pp.jasa END AS jasa,pp.hargasatuan, " & _
'                         " pp.jumlah AS qtyhrg,(pp.jumlah * (pp.hargasatuan-(case when pp.hargadiscount is null then 0 else pp.hargadiscount end )) )+case when pp.jasa is null then 0 else pp.jasa end as totalharga,jnskem.jeniskemasan,pgw.namalengkap, " & _
'                         " CASE WHEN pp.hargadiscount IS NULL THEN 0 ELSE pp.hargadiscount * pp.jumlah END AS totaldiscound, " & _
'                         " ((pp.jumlah * pp.hargasatuan ) - (CASE when pp.hargadiscount isnull then 0 ELSE  pp.hargadiscount * pp.jumlah end))+case when pp.jasa is null then 0 else pp.jasa end as totalbiaya,pp.jumlah as qtydetailresep " & _
'                         " FROM pelayananpasienobatkronis_t AS pp " & _
'                         " INNER JOIN antrianpasiendiperiksa_t AS apdp ON pp.noregistrasifk = apdp.norec " & _
'                         " INNER JOIN pasiendaftar_t AS pd ON apdp.noregistrasifk = pd.norec " & _
'                         " INNER JOIN pasien_m AS ps ON pd.nocmfk = ps.id " & _
'                         " left join alamat_m as al on al.nocmfk=ps.id " & _
'                         " INNER JOIN produk_m AS pr ON pp.produkfk = pr.id " & _
'                         " INNER JOIN ruangan_m AS ru ON apdp.objectruanganfk = ru.id " & _
'                         " INNER JOIN strukresep_t AS sr ON pp.strukresepfk = sr.norec " & _
'                         " INNER JOIN ruangan_m AS ru2 ON sr.ruanganfk = ru2.id " & _
'                         " INNER JOIN jeniskemasan_m AS jnskem ON pp.jeniskemasanfk = jnskem.id " & _
'                         " INNER JOIN pegawai_m AS pgw ON sr.penulisresepfk = pgw.id " & _
'                         " INNER JOIN satuanstandar_m AS sstd ON pp.satuanviewfk = sstd.id " & _
'                         " INNER JOIN jeniskelamin_m AS jk ON ps.objectjeniskelaminfk = jk.id " & _
'                         " INNER JOIN kelompokpasien_m AS kpp ON pd.objectkelompokpasienlastfk = kpp.id " & _
'                         " left JOIN rekanan_m as rek on rek.id=pd.objectrekananfk " & _
'                         " WHERE sr.norec='" & strNores & "'"
             strSQL = " SELECT pd.noregistrasi,ps.nocm,'(' || EXTRACT(YEAR FROM AGE(to_date(to_char(pd.tglregistrasi,'YYYY-MM-DD'),'YYYY-MM-DD'),to_date(to_char(ps.tgllahir,'YYYY-MM-DD'),'YYYY-MM-DD'))) || ' Thn ' || EXTRACT(MONTH FROM AGE(to_date(to_char(pd.tglregistrasi,'YYYY-MM-DD'),'YYYY-MM-DD'),to_date(to_char(ps.tgllahir,'YYYY-MM-DD'),'YYYY-MM-DD'))) || ' Bln ' || EXTRACT(MONTH FROM AGE(to_date(to_char(pd.tglregistrasi,'YYYY-MM-DD'),'YYYY-MM-DD'),to_date(to_char(ps.tgllahir,'YYYY-MM-DD'),'YYYY-MM-DD'))) || ' Hr)' AS umur, " & _
                      " ps.namapasien || ' ( ' || jk.reportdisplay || ' )' AS namapasienjk, " & _
                      " kpp.kelompokpasien,kpp.kelompokpasien || ' ( ' || rek.namarekanan || ' ) ' AS penjamin,ps.nohp AS noteleponfaks, " & _
                      " al.alamatlengkap AS alamat,ps.tgllahir,pd.tglregistrasi,ru.namaruangan AS ruanganpasien,'-' AS alergi,sr.noresep, " & _
                      " ru2.namaruangan,pp.tglpelayanan AS tgl,pp.rke,pr. ID AS kdproduk, " & _
                      " pr.namaproduk || ' / ' || sstd.satuanstandar AS namaprodukstandar,pp.jumlah, " & _
                      " CASE WHEN pp.jasa IS NULL THEN 0 ELSE pp.jasa END AS jasa,pp.hargasatuan,pp.jumlah AS qtyhrg, " & _
                      " (((pp.qtydetailresep*7)/30) * (pp.hargasatuan - (CASE WHEN pp.hargadiscount IS NULL THEN 0 ELSE pp.hargadiscount END))) + " & _
                      " CASE WHEN pp.jasa IS NULL THEN 0 ELSE pp.jasa END AS totalharga,jnskem.jeniskemasan,pgw.namalengkap, " & _
                      " CASE WHEN pp.hargadiscount IS NULL THEN 0 ELSE pp.hargadiscount * pp.jumlah END AS totaldiscound, " & _
                      " ((((pp.qtydetailresep*7)/30) * pp.hargasatuan) - (CASE WHEN pp.hargadiscount ISNULL THEN 0 ELSE pp.hargadiscount * ((pp.qtydetailresep*7)/30) END)) + " & _
                      " CASE WHEN pp.jasa IS NULL THEN 0 ELSE pp.jasa END AS totalbiaya,((pp.qtydetailresep*7)/30) AS qtydetailresep,to_char(sr.tglresep,'DD-MM-YYYY') AS tglresept " & _
                      " FROM pelayananpasien_t AS pp " & _
                      " INNER JOIN antrianpasiendiperiksa_t AS apdp ON pp.noregistrasifk = apdp.norec " & _
                      " INNER JOIN pasiendaftar_t AS pd ON apdp.noregistrasifk = pd.norec " & _
                      " INNER JOIN pasien_m AS ps ON pd.nocmfk = ps.id " & _
                      " LEFT JOIN alamat_m AS al ON al.nocmfk = ps.id " & _
                      " INNER JOIN produk_m AS pr ON pp.produkfk = pr.id " & _
                      " INNER JOIN ruangan_m AS ru ON apdp.objectruanganfk = ru.id " & _
                      " INNER JOIN strukresep_t AS sr ON pp.strukresepfk = sr.norec " & _
                      " INNER JOIN ruangan_m AS ru2 ON sr.ruanganfk = ru2.id INNER JOIN jeniskemasan_m AS jnskem ON pp.jeniskemasanfk = jnskem.id INNER JOIN pegawai_m AS pgw ON sr.penulisresepfk = pgw.id " & _
                      " INNER JOIN satuanstandar_m AS sstd ON pp.satuanviewfk = sstd.id INNER JOIN jeniskelamin_m AS jk ON ps.objectjeniskelaminfk = jk.id INNER JOIN kelompokpasien_m AS kpp ON pd.objectkelompokpasienlastfk = kpp.id " & _
                      " LEFT JOIN rekanan_m AS rek ON rek. ID = pd.objectrekananfk  " & _
                      " WHERE sr.norec='" & strNores & "' AND pp.iskronis=true and pp.produkfk <> 10013803 "
            
            ReadRs strSQL
             
             adoReport.CommandText = strSQL
             adoReport.CommandType = adCmdUnknown
            .database.AddADOCommand CN_String, adoReport
                .txtNamaRs.SetText strNamaLengkapRs
                .txtAlamatRs.SetText strAlamatRS & ", " & strKodePos
                .txtTelpFax.SetText strNoTlpn & ", " & strNoFax
'                .txtNamaKota.SetText strNamaKota & ","
                .txtNamaUser.SetText strUser
                .txt723.SetText "/23"
             If Not rs.EOF Then
                .txtNoPendaftaran.SetText IIf(IsNull(rs("noregistrasi")), "-", rs("noregistrasi")) 'RS("noregistrasi")
                .txtNocm.SetText IIf(IsNull(rs("nocm")), "-", rs("nocm"))
                .txtnmpasien.SetText IIf(IsNull(rs("namapasienjk")), "-", rs("namapasienjk")) 'RS("namapasienjk")
                .txtNamaRuangan.SetText IIf(IsNull(rs("ruanganpasien")), "-", rs("ruanganpasien")) 'RS("ruanganpasien")
                .txtKelompokPasien.SetText IIf(IsNull(rs("kelompokpasien")), "-", rs("kelompokpasien"))
                .txtNamaDokter.SetText IIf(IsNull(rs("namalengkap")), "-", rs("namalengkap")) 'RS("namalengkap")
'                .txtTglresep.SetText IIf(IsNull(rs("tglresept")), "-", rs("tglresept"))
                .usNoResep.SetUnboundFieldSource ("{Ado.noresep}")
                .ucbiayasatuan.SetUnboundFieldSource ("{Ado.totalharga}")
                .ustindakan.SetUnboundFieldSource ("{Ado.namaprodukstandar}")
                .usQtyHrg.SetUnboundFieldSource ("{Ado.qtyhrg}")
                .unQtyTotal.SetUnboundFieldSource ("{Ado.jumlah}")
                .ucGrandTotal.SetUnboundFieldSource ("{Ado.totalharga}")
                .undis.SetUnboundFieldSource ("{Ado.totaldiscound}")
                .unTotal.SetUnboundFieldSource ("{Ado.totalbiaya}")
                .unQtyDetail.SetUnboundFieldSource ("{ado.qtydetailresep}")
                .unRacikanKe.SetUnboundFieldSource ("{ado.rke}")
                .usJenisObat.SetUnboundFieldSource ("{ado.jeniskemasan}")
             End If
            If view = "false" Then
                strPrinter1 = GetTxt("Setting.ini", "Printer", "CetakResep")
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

Public Sub cetakStrukResepAll(strNores As String, view As String, strUser As String, counterId As String)
'On Error GoTo errLoad
Set frmCetakBuktiLayananFarmasi = Nothing
Dim strSQL As String

bolStrukResep = True
    
    
        With ReportResep
            Set adoReport = New ADODB.Command
            adoReport.ActiveConnection = CN_String
                        
            strSQL = " SELECT pd.noregistrasi,ps.nocm,'(' || EXTRACT(YEAR FROM AGE(to_date(to_char(pd.tglregistrasi,'YYYY-MM-DD'),'YYYY-MM-DD'),to_date(to_char(ps.tgllahir,'YYYY-MM-DD'),'YYYY-MM-DD'))) || ' Thn ' || EXTRACT(MONTH FROM AGE(to_date(to_char(pd.tglregistrasi,'YYYY-MM-DD'),'YYYY-MM-DD'),to_date(to_char(ps.tgllahir,'YYYY-MM-DD'),'YYYY-MM-DD'))) || ' Bln ' || EXTRACT(MONTH FROM AGE(to_date(to_char(pd.tglregistrasi,'YYYY-MM-DD'),'YYYY-MM-DD'),to_date(to_char(ps.tgllahir,'YYYY-MM-DD'),'YYYY-MM-DD'))) || ' Hr)' AS umur,ps.namapasien || ' ( ' || jk.reportdisplay || ' )' AS namapasienjk,kpp.kelompokpasien, " & _
                     " kpp.kelompokpasien || ' ( ' || rek.namarekanan || ' ) ' AS penjamin,ps.nohp AS noteleponfaks, " & _
                     " al.alamatlengkap AS alamat,to_char(ps.tgllahir,'DD-MM-YYYY') AS tgllahir,pd.tglregistrasi,ru.namaruangan AS ruanganpasien, " & _
                     " '-' AS alergi,sr.noresep,ru2.namaruangan,pp.tglpelayanan AS tgl,pp.rke,pr. ID AS kdproduk, " & _
                     " pr.namaproduk || ' / ' || sstd.satuanstandar AS namaprodukstandar,pp.jumlah, CASE WHEN pp.jasa IS NULL THEN 0 ELSE pp.jasa END AS jasa,pp.hargasatuan, " & _
                     " pp.jumlah AS qtyhrg,(pp.jumlah * (pp.hargasatuan-(case when pp.hargadiscount is null then 0 else pp.hargadiscount end )) )+case when pp.jasa is null then 0 else pp.jasa end as totalharga,jnskem.jeniskemasan,pgw.namalengkap, " & _
                     " CASE WHEN pp.hargadiscount IS NULL THEN 0 ELSE pp.hargadiscount * pp.jumlah END AS totaldiscound, CASE when pp.jasa is null then 0 ELSE pp.jasa end as jasa, " & _
                     " CASE when pp.hargadiscount is null then 0 ELSE  pp.hargadiscount end as diskon,(pp.hargasatuan*pp.jumlah) as total, " & _
                     " ((pp.jumlah * pp.hargasatuan ) - (CASE when pp.hargadiscount isnull then 0 ELSE  pp.hargadiscount * pp.jumlah end))+case when pp.jasa is null then 0 else pp.jasa end as totalbiaya,pp.qtydetailresep,to_char(sr.tglresep,'DD-MM-YYYY') AS tglresept " & _
                     " FROM pelayananpasien_t AS pp " & _
                     " INNER JOIN antrianpasiendiperiksa_t AS apdp ON pp.noregistrasifk = apdp.norec " & _
                     " INNER JOIN pasiendaftar_t AS pd ON apdp.noregistrasifk = pd.norec " & _
                     " INNER JOIN pasien_m AS ps ON pd.nocmfk = ps.id " & _
                     " left join alamat_m as al on al.nocmfk=ps.id " & _
                     " INNER JOIN produk_m AS pr ON pp.produkfk = pr.id " & _
                     " INNER JOIN ruangan_m AS ru ON apdp.objectruanganfk = ru.id " & _
                     " INNER JOIN strukresep_t AS sr ON pp.strukresepfk = sr.norec " & _
                     " INNER JOIN ruangan_m AS ru2 ON sr.ruanganfk = ru2.id " & _
                     " INNER JOIN jeniskemasan_m AS jnskem ON pp.jeniskemasanfk = jnskem.id " & _
                     " INNER JOIN pegawai_m AS pgw ON sr.penulisresepfk = pgw.id " & _
                     " INNER JOIN satuanstandar_m AS sstd ON pp.satuanviewfk = sstd.id " & _
                     " INNER JOIN jeniskelamin_m AS jk ON ps.objectjeniskelaminfk = jk.id " & _
                     " INNER JOIN kelompokpasien_m AS kpp ON pd.objectkelompokpasienlastfk = kpp.id " & _
                     " left JOIN rekanan_m as rek on rek.id=pd.objectrekananfk " & _
                     " WHERE pd.noregistrasi = '" & strNores & "' and pp.produkfk <> 10013803 "
            
            ReadRs strSQL
            
            ReadRs3 " select sum(pp.hargajual) AS jasa " & _
                    " from pelayananpasien_t AS pp " & _
                    " INNER JOIN antrianpasiendiperiksa_t AS apd ON apd.norec = pp.noregistrasifk " & _
                    " INNER JOIN pasiendaftar_t AS pd ON pd.norec = apd.noregistrasifk " & _
                    " WHERE pd.noregistrasi = '" & strNores & "' AND pp.produkfk = 10013803 "
'            ReadRs2 "select TOP 1 cast(km.namakamar as VARCHAR) + ' / No. ' + cast(tt.nomorbed as VARCHAR) AS kamar " & _
'                    "from pasiendaftar_t as pd " & _
'                    "inner join antrianpasiendiperiksa_t as apdp on apdp.noregistrasifk = pd.norec " & _
'                    "inner join kamar_m as km on km.id=apdp.objectkamarfk inner join tempattidur_m as tt on tt.objectkamarfk=km.id " & _
'                    "where pd.noregistrasi= '" & (RS("noregistrasi")) & "'"
             
             
             adoReport.CommandText = strSQL
             adoReport.CommandType = adCmdUnknown
            .database.AddADOCommand CN_String, adoReport
            .txtNamaRs.SetText strNamaLengkapRs
            .txtAlamatRs.SetText strAlamatRS & ", " & strKodePos
            .txtTelpFax.SetText strNoTlpn & ", " & strNoFax
            .txtNamaUser.SetText strUser
             If Not rs.EOF Then
                     ReadRs2 "select cast(km.namakamar as VARCHAR) || ' / No. ' || cast(tt.nomorbed as VARCHAR) AS kamar " & _
                             "from pasiendaftar_t as pd " & _
                             "inner join antrianpasiendiperiksa_t as apdp on apdp.noregistrasifk = pd.norec " & _
                             "inner join kamar_m as km on km.id=apdp.objectkamarfk inner join tempattidur_m as tt on tt.objectkamarfk=km.id " & _
                             "where pd.noregistrasi= '" & (rs("noregistrasi")) & "' limit 1"
           
                     .txtNoPendaftaran.SetText IIf(IsNull(rs("noregistrasi")), "-", rs("noregistrasi")) 'RS("noregistrasi")
                     .txtNocm.SetText IIf(IsNull(rs("nocm")), "-", rs("nocm"))
                     .txtnmpasien.SetText IIf(IsNull(rs("namapasienjk")), "-", rs("namapasienjk")) 'RS("namapasienjk")
                     '.txtklpkpasien.SetText RS("kelompokpasien")
                     '.txtPenjamin.SetText IIf(isnull(RS("NamaPenjamin")), "Sendiri", RS("NamaPenjamin"))
                     .txtNamaRuangan.SetText IIf(IsNull(rs("ruanganpasien")), "-", rs("ruanganpasien")) 'RS("ruanganpasien")
                     .txtKelompokPasien.SetText IIf(IsNull(rs("kelompokpasien")), "-", rs("kelompokpasien"))
                     .txtalamat.SetText IIf(IsNull(rs("alamat")), "-", rs("alamat"))
                     .txtJenisPasien.SetText IIf(IsNull(rs("penjamin")), "-", rs("penjamin"))
                     .txtTglRsp.SetText IIf(IsNull(rs("tglresept")), "-", rs("tglresept"))
'                     .txtTglresep.SetText IIf(IsNull(rs("tglresept")), "-", rs("tglresept"))
'                     .txtNamaRuanganFarmasi.SetText IIf(IsNull(rs("namaruangan")), "-", rs("namaruangan")) 'RS("namaruangan")
'                        If IsNull(rs("penjamin")) = True Then
'                            .txtPenjamin.SetText "-"
'                        Else
'                            .txtPenjamin.SetText rs("penjamin")
'                        End If
'                         If rs("umur") = "-" Then
'                            .txtUmur.SetText "-"
'                         Else
'                            .txtUmur.SetText hitungUmur(Format(rs("tgllahir"), "dd/mm/yyyy"), Format(rs("tglregistrasi"), "dd/mm/yyyy"))
'                         End If
                         .txtNamaDokter.SetText IIf(IsNull(rs("namalengkap")), "-", rs("namalengkap")) 'RS("namalengkap")
'                         .txtuser.SetText strUser
'                        If Left(rs("noresep"), 2) = "OB" Then
'                            .txtTglLahir.SetText IIf(IsNull(Format(rs("tgllahir"), "dd/mm/yyyy")), "-", Format(rs("tgllahir"), "dd/mm/yyyy")) 'RS!tgllahir
'                            .txtTelp2.SetText IIf(IsNull(rs("noteleponfaks")), "-", rs("noteleponfaks")) 'RS!noteleponfaks
'                            .txtAl2.SetText IIf(IsNull(rs("alamat")), "-", rs("alamat")) 'RS!alamat
'                            .txtTgl.SetText IIf(IsNull(Format(rs("tgl"), "dd/mm/yyyy HH:mm:ss")), "-", Format(rs("tgl"), "dd/mm/yyyy HH:mm:ss")) 'RS!tgl
'                        Else
'                            .txtTglLahir.SetText IIf(IsNull(rs("tgllahir")), "-", rs("tgllahir")) 'RS!tgllahir
'                            .txtTelp2.SetText IIf(IsNull(rs("noteleponfaks")), "-", rs("noteleponfaks")) 'RS!noteleponfaks
'                            .txtAl2.SetText IIf(IsNull(rs("alamat")), "-", rs("alamat")) 'RS!alamat
'                             If Not rs.EOF Then
'                                 If RS2.RecordCount > 0 Then
'                                    .txtKamar.SetText IIf(IsNull(RS2("kamar")), "-", RS2("kamar")) 'RS!noteleponfaks
'                                End If
''                             End If
'                            .txtTgl.SetText IIf(IsNull(Format(rs("tgl"), "dd/mm/yyyy HH:mm:ss")), "-", Format(rs("tgl"), "dd/mm/yyyy HH:mm:ss")) 'RS!tgl
'                            .txtAlergi.SetText IIf(IsNull(rs("alergi")), "-", rs("alergi")) 'RS!alergi
            
'                        End If
            End If
'            .txtCounterId.SetText counterId
           '  .usSatuan.SetUnboundFieldSource ("{ado.SatuanJmlK}")
          '   .udtanggal.SetUnboundFieldSource ("{Ado.tglpelayanan}")
             .usNoResep.SetUnboundFieldSource ("{Ado.noresep}")
             .ucbiayasatuan.SetUnboundFieldSource ("{Ado.totalharga}")
             .usTglLahir.SetUnboundFieldSource ("{Ado.tgllahir}")
    '2         .ucHrgSatuan.SetUnboundFieldSource ("{Ado.hargasatuan}")
'             .uskdproduk.SetUnboundFieldSource ("{Ado.kdproduk}")
             .ustindakan.SetUnboundFieldSource ("{Ado.namaprodukstandar}")
             .usQtyHrg.SetUnboundFieldSource ("{Ado.qtyhrg}")
             .unQtyTotal.SetUnboundFieldSource ("{Ado.jumlah}")
             .ucGrandTotal.SetUnboundFieldSource ("{Ado.total}") '("{Ado.totalharga}")
             .unJasa.SetUnboundFieldSource ("{Ado.jasa}")
             .unDiskon.SetUnboundFieldSource ("{Ado.diskon}")
             .undis.SetUnboundFieldSource ("{Ado.totaldiscound}")
             .unTotal.SetUnboundFieldSource ("{Ado.totalbiaya}")
             .unQtyDetail.SetUnboundFieldSource ("{ado.qtydetailresep}")
             .unRacikanKe.SetUnboundFieldSource ("{ado.rke}")
             .usJenisObat.SetUnboundFieldSource ("{ado.jeniskemasan}")
            If Not RS3.EOF Then
                .txtJasa.SetText IIf(IsNull(RS3("jasa")), 0, Format(RS3("jasa"), "##,##0.00"))
            End If
            If view = "false" Then
                strPrinter1 = GetTxt("Setting.ini", "Printer", "CetakResep")
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

