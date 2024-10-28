import socket
servidor = socket.socket(socket.AF_INET, socket.SOCK_SREAM)
servidor.bind(('localhost', 8888))

servidor.listen()
cliente, end = servidor.accept()
terminado = False
while not terminado:
    msg = cliente.recv(1024).decode('uft-8')
    if msg == 'tt':
        terminado = True
    else: 
        print (msg)
    cliente.send(input('Mensagem: ').encode('uft-8'))
cliente.close()
servidor.close()