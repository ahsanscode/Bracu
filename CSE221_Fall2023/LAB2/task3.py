with open('input3(3).txt', 'r') as input_file:
    with open('output3(3).txt', 'w') as output_file:
        n = int(input_file.readline())
        time_slots = []
        for var in range(n):
            temp = tuple(map(int, input_file.readline().split(' ')))
            time_slots.append(temp)
        time_slots.sort(key=lambda x: x[1])

        count = 0
        out_arr = []
        try:
            current = time_slots[0]
            out_arr.append(current)
            count += 1
            for var in range(1, n):
                temp = time_slots[var]
                if str(current) == str(temp):
                    continue
                if (current[1] <= temp[0]) and (temp[0] < temp[1]):
                    current = temp
                    count += 1
                    out_arr.append(temp)

            output_file.write(f'{count}\n')
            for var in range(count):
                output_file.write(f'{out_arr[var][0]} {out_arr[var][1]}\n')
        except:
            pass
