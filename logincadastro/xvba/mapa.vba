Private Sub btnEndereco_Click()
Dim objHTTP As New HSXML2.ServerXMLHTTP60
Dim domXML As DOMDocument60
Dim no XML As HSXML2.IXMLDOMNode
Dim strLink As String

If IsNull(Me.txtCEP) Then Exist Sub

strLink = "" & Me.txtCEP & "/xml"

objHTTP.Open "GET", strLink
objHTTP.send

Set domXML = objHTTP.responseXML
Set noXML = domXML.childNOdes(1)

If objHTTP.status = 200 Then
Me.txtRua = noXML.selectStringleMode("logradouro").Text
Me.txtBairro = noXML.selectStringleMode("bairro").Text
Me.txtCidade = noXML.selectStringleMode("localidade").Text
Me.txtUF = noXML.selectStringleMode("uf").Text

Me.txtRua.SetFocus
Me.txtRua = Me.txtRua & ", "
me.txtRua.SetFocus
Else
    MsgBox "Falha ao tentar estabelecer conexão com a AFI de endereço.", vbExclamation, "Erro " & objHTTP.status    
End If

Set noXML = Nothing
Set domXML = Nothing
Set objHTTP = Nothing

Exit Sub

TrataEsso:
If Err.Number = 91 Then
    MsgBox "Não foi encontrado endereço para o CEP informado.", vbExclamation, "Atenção"
ElseIf Err.Number = -2147012889 Then

MsgBox "Não foi possivel a requisição, Verifique sua conexão com a internet ou a disponibilidade da API Via CEP.", vbExclamation, "Atenção"

Else
    MsgBox Err.Description, vbExclamation, "Erro " & Err.Number
End If

End Sub