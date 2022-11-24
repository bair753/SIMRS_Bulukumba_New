VERSION 5.00
Begin {BD4B4E61-F7B8-11D0-964D-00A0C9273C2A} crRekapBiaya 
   ClientHeight    =   9240
   ClientLeft      =   0
   ClientTop       =   0
   ClientWidth     =   14955
   OleObjectBlob   =   "crRekapBiaya.dsx":0000
End
Attribute VB_Name = "crRekapBiaya"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Private Sub Section11_Format(ByVal pFormattingInfo As Object)
'kata bo rose tgl 26oktober 2017, pasien tidak mendapatkan billing
'sehingga terbilang ke tagihan perusahaan

    Dim x As Double
    Dim jumlahDuit As Double
    Dim pembulatan As Double
    Dim total As Double
    Dim bulatan As Double
    Dim Hasil As Double
    Dim duit As Double
'    x = Round(ucJumlahBill.Value)
    jumlahDuit = Round(ucJumlahBill.Value)
    txtTotal.SetText "Rp. " & Format(jumlahDuit, "##,##0.00")
    duit = ucJumlahBill.Value
'    txtTerbilang.SetText "# " & TERBILANG(ucJumlahBill.Value) & " #"
    txtTerbilang.SetText "# " & TerbilangDesimal(Round(ucJumlahBill.Value, 0)) & " #"
    bulatan = Right(CStr(jumlahDuit), 2)
    Hasil = Val(jumlahDuit - Val(bulatan))
    If Val(Right(jumlahDuit, 2)) <> 0 Then
        If Val(Right(jumlahDuit, 2)) >= 50 Then
            pembulatan = 100 - Val(Right(jumlahDuit, 2))
            Hasil = Val(jumlahDuit) + pembulatan
        ElseIf Val(Right(jumlahDuit, 2)) < 50 Then
            pembulatan = 100 - Val(Right(jumlahDuit, 2))
            Hasil = Val(jumlahDuit) + pembulatan
        End If
    Else
        pembulatan = 0
    End If
    txtBulat.SetText "Rp. " & Format(pembulatan, "##,##0.00")
    txtJmlTotal.SetText "Rp. " & Format(Hasil, "##,##0.00")
'    txtPembulatan.SetText Format(X, "##,##0.00")
'
'    X = CDbl(ucDitanggungPerusahaan.Value) 'Round(CDbl(ucDitanggungPerusahaan.Value))
'    a.SetText Format(X, "##,##0.#0")
'    X = CDbl(ucDitanggungRS.Value) 'Round(CDbl(ucDitanggungRS.Value))
'    b.SetText Format(X, "##,##0.#0")
'    X = CDbl(ucDitanggungSendiri.Value) 'Round(CDbl(ucDitanggungSendiri.Value))
'    If X < 0 Then
'        c.SetText Format(0, "##,##0.#0")
'    Else
'        c.SetText Format(X, "##,##0.#0")
'    End If
'    X = CDbl(ucSurplusMinusRS.Value) 'Round(CDbl(ucSurplusMinusRS.Value))
'    d.SetText Format(X, "##,##0.#0")
'
'    'If usTipe.Value = "Umum/Pribadi" Then
'    If CDbl(ucDitanggungPerusahaan.Value) = 0 Then
'        txtTerbilang.SetText "# " & TerbilangDesimal(txtPembulatan.Text) & " #"
'    Else
'        txtTerbilang.SetText "# " & TerbilangDesimal(ucDitanggungPerusahaan.Value) & " #"
'    End If

'    ucJumlahBill.Value = Replace(txtPembulatan.Text, ".", ",")
'    txtTerbilang.SetText "# " & TerbilangDesimal(Replace(txtPembulatan.Text, ".", ",")) & " #"
    
End Sub

