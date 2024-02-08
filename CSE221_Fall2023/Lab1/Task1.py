with open('input1a.txt','r') as input_file :
    with open('output1a.txt','w') as output_file:
        listx = input_file.readlines()
        for var in range(len(listx)):
            temp = int(listx[var])
            if temp % 2 == 0:
                output_file.write(f'{temp} is an Even number.\n')
            else:
                output_file.write(f'{temp} is an Odd  number.\n')


with open('input1b.txt','r') as input_file :
    with open('output1b.txt','w') as output_file:
        lenght = int(input_file.readline())
        listx = input_file.readlines()
        for var in range(lenght):
            temp = listx[var].split()
            a = int(temp[1])
            b = int(temp[3])
            oparator = temp[2]

            if oparator == '+':
                output_file.write(f'The result of {a} + {b} is {a+b}\n')
            if oparator == '-':
                output_file.write(f'The result of {a} - {b} is {a-b}\n')
            if oparator == '*':
                output_file.write(f'The result of {a} * {b} is {a*b}\n')
            if oparator == '/':
                output_file.write(f'The result of {a} / {b} is {a/b}\n')


