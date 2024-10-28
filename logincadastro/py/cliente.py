import socket
cliente = socket.socket(socket.AF_INET, socket.SOCK_SREAM)
cliente.connect(('localhost', 9009))
terminado = False
print('Digite tt para terminar o chat')
while not terminado: 
    cliente.send(input('Mensagem: ').encode('utf-8'))
    msg = cliente.recv(1024).decode('utf-8')
    if msg == 'tt':
        terminado = True
    else: 
        print(msg)
cliente.close()