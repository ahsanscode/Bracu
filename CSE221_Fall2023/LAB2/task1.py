with open('input1(4).txt', 'r') as input_file:
    with open('output1(4)Nsq.txt', 'w') as output_file:
        input1 = list(map(int, input_file.readline().split(' ')))
        input2 = list(map(int, input_file.readline().split(' ')))
        idx = None
        boolian = False
        for var in range(input1[0]):
            temp = input2[var]
            if boolian == True:
                break
            for varx in range(var + 1, input1[0]):
                tempx = input2[varx]
                if (temp + tempx) == input1[1]:
                    output_file.write(f'{var + 1} {varx + 1}')
                    boolian = True
                    break
        if boolian == False:
            output_file.write(f'IMPOSSIBLE')

with open('input1(4).txt', 'r') as input_file:
    with open('output1(4)N.txt', 'w') as output_file:
        input1 = list(map(int, input_file.readline().split(' ')))
        input2 = list(map(int, input_file.readline().split(' ')))
        l = 0
        r = len(input2) - 1
        boolian = False
        sum = input1[1]
        while l < r:
            if input2[l] + input2[r] == sum:
                output_file.write(f'{l + 1} {r + 1}')
                boolian = True
                break
            elif input2[l] + input2[r] < sum:
                l += 1
            elif input2[l] + input2[r] > sum:
                r -= 1

        if boolian == False:
            output_file.write(f'IMPOSSIBLE')
