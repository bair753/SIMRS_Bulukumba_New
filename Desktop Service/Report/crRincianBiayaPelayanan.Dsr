VERSION 5.00
Begin {BD4B4E61-F7B8-11D0-964D-00A0C9273C2A} crRincianBiayaPelayanan 
   ClientHeight    =   9240
   ClientLeft      =   0
   ClientTop       =   0
   ClientWidth     =   14955
   OleObjectBlob   =   "crRincianBiayaPelayanan.dsx":0000
End
Attribute VB_Name = "crRincianBiayaPelayanan"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Private Sub Section11_Format(ByVal pFormattingInfo As Object)
'kata bo rose tgl 26oktober 2017, pasien tidak mendapatkan billing
'sehingga terbilang ke tagihan perusahaan

    Dim x, Y As Double
    Dim jumlahDuit As Double
    Dim pembulatan As Double
    Dim Hasil As Double
    d.SetText "Rp. " & Format(0, "##,##0.00")
If CDbl(ucDitanggungPerusahaan.Value) = 0 Then
    jumlahDuit = ucJumlahBill.Value 'Round(ucJumlahBill.Value)
    txtJmlBilling.SetText "Rp. " & Format(jumlahDuit, "##,##0.00")
'    If Val(Right(jumlahDuit, 2)) <> 0 Then
'        If Val(Right(jumlahDuit, 2)) >= 50 Then
'            pembulatan = 100 - Val(Right(jumlahDuit, 2))
'            jumlahDuit = Val(jumlahDuit) + pembulatan
'        ElseIf Val(Right(jumlahDuit, 2)) < 50 Then
'            pembulatan = 100 - Val(Right(jumlahDuit, 2))
'            jumlahDuit = Val(jumlahDuit) + pembulatan
'        End If
'    Else
'        pembulatan = 0
'    End If
    txtPembulatan.SetText "Rp. " & Format(pembulatan, "##,##0.00")
    a.SetText "Rp. " & Format(0, "##,##0.00")
    b.SetText "Rp. " & Format(0, "##,##0.00")
    c.SetText "Rp. " & Format(jumlahDuit, "##,##0.00")
Else
    jumlahDuit = ucDitanggungPerusahaan.Value 'Round(ucDitanggungPerusahaan.Value)
    txtJmlBilling.SetText "Rp. " & Format(jumlahDuit, "##,##0.00")
'    If Val(Right(jumlahDuit, 2)) <> 0 Then
'        If Val(Right(jumlahDuit, 2)) >= 50 Then
'            pembulatan = 100 - Val(Right(jumlahDuit, 2))
'            jumlahDuit = Val(jumlahDuit) + pembulatan
'        ElseIf Val(Right(jumlahDuit, 2)) < 50 Then
'            pembulatan = 100 - Val(Right(jumlahDuit, 2))
'            jumlahDuit = Val(jumlahDuit) + pembulatan
'        End If
'    Else
'        pembulatan = 0
'    End If
'    txtPembulatan.SetText "Rp. " & Format(pembulatan, "##,##0.00")
'    txtJmlTotal.SetText "Rp. " & Format(jumlahDuit, "##,##0.00")
     a.SetText "Rp. " & Format(jumlahDuit, "##,##0.00")
     c.SetText "Rp. " & Format(0, "##,##0.00")
     b.SetText "Rp. " & Format(0, "##,##0.00")
End If
    
'    txtPembulatan.SetText Format(x, "##,##0.00")
''    ucTotalR.Value = Format(Y, "##,##0.00")
'    x = CDbl(ucDitanggungPerusahaan.Value) 'Round(CDbl(ucDitanggungPerusahaan.Value))
'    a.SetText Format(x, "##,##0.#0")
'    x = CDbl(ucDitanggungRS.Value) 'Round(CDbl(ucDitanggungRS.Value))
'    b.SetText Format(x, "##,##0.#0")
'    x = CDbl(ucDitanggungSendiri.Value) 'Round(CDbl(ucDitanggungSendiri.Value))
'    'If X < 0 Then
'    c.SetText Format(x, "##,##0.#0")
'    'Else
'        'c.SetText Format(X, "##,##0.#0")
'    'End If
'    x = CDbl(ucSurplusMinusRS.Value) 'Round(CDbl(ucSurplusMinusRS.Value))
'    d.SetText Format(x, "##,##0.#0")
    
    'If usTipe.Value = "Umum/Pribadi" Then
    

'    ucJumlahBill.Value = Replace(txtPembulatan.Text, ".", ",")
'    txtTerbilang.SetText "# " & TerbilangDesimal(Replace(txtPembulatan.Text, ".", ",")) & " #"
    
End Sub

Private Sub Section12_Format(ByVal pFormattingInfo As Object)
    If CDbl(ucDitanggungPerusahaan.Value) = 0 Then
        txtTerbilang.SetText "# " & TerbilangDesimal(ucJumlahBill.Value) & " #" '(Round(ucJumlahBill.Value, 0))
        txtTerbilang.SetText "# " & TerbilangDesimal(ucTotalTotal.Value) & " #" '
    Else
        txtTerbilang.SetText "# " & TerbilangDesimal(ucDitanggungPerusahaan.Value) & " #" '(Round(ucDitanggungPerusahaan.Value, 0))
    End If
'    If CDbl(ucDitanggungPerusahaan.Value) = 0 Then
''        txtTerbilang.SetText "# " & TerbilangDesimal(txtPembulatan.Text) & " #"
'        txtTerbilang.SetText "# " & TERBILANG(ucJumlahBill.Value) & " #"
'    Else
'        txtTerbilang.SetText "# " & TERBILANG(ucDitanggungPerusahaan.Value) & " #"
'    End If
End Sub

Private Sub Section9_Format(ByVal pFormattingInfo As Object)
    Dim JmlBiayaBill As Double
    Dim jmlBulat As Double
    Dim jmlTotal As Double
'    Y = Round(ucTotalTotal.Value)
'    x = Round(ucJumlahBill.Value)
    JmlBiayaBill = ucTotalTotal.Value 'Round(ucTotalTotal.Value)
    txtJmlBiayas.SetText "Rp. " & Format(JmlBiayaBill, "##,##0.00")
'    If Val(Right(JmlBiayaBill, 2)) <> 0 Then
'        If Val(Right(JmlBiayaBill, 2)) >= 50 Then
'            jmlBulat = 100 - Val(Right(JmlBiayaBill, 2))
'            jmlTotal = Val(JmlBiayaBill) + jmlBulat
'        ElseIf Val(Right(JmlBiayaBill, 2)) < 50 Then
'            jmlBulat = 100 - Val(Right(JmlBiayaBill, 2))
'            jmlTotal = Val(JmlBiayaBill) + jmlBulat
'        End If
'    Else
'        jmlBulat = 0
'    End If
'    txtJmlBulat.SetText "Rp. " & Format(jmlBulat, "##,##0.00")
    txtBiayaTotal.SetText "Rp. " & Format(JmlBiayaBill, "##,##0.00")
    '''''''''''''''''''''''' TLAH DIBAYAR '''''''''''''''''''''''''''
    Dim JmlBiayaDibayar As Double
    Dim jmlBiayaBulat As Double
    Dim jmlBiayaTotal As Double
    JmlBiayaDibayar = ucJmlahTlahDBayar.Value 'Round(ucJmlahTlahDBayar.Value)
'    If Val(Right(JmlBiayaBill, 2)) <> 0 Then
'        If Val(Right(JmlBiayaDibayar, 2)) >= 50 Then
'            jmlBiayaBulat = 100 - Val(Right(JmlBiayaDibayar, 2))
'            jmlBiayaTotal = Val(JmlBiayaDibayar) + jmlBiayaBulat
'        ElseIf Val(Right(JmlBiayaDibayar, 2)) < 50 Then
'            jmlBiayaBulat = 100 - Val(Right(JmlBiayaDibayar, 2))
'            jmlBiayaTotal = Val(JmlBiayaDibayar) + jmlBiayaBulat
'        End If
'    Else
'        jmlBiayaBulat = 0
'    End If
    txtJmlTlahDibayar.SetText "Rp. " & Format(JmlBiayaDibayar, "##,##0.00")
End Sub
