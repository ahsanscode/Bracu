arr = ['ABCD will departure for Mymensingh at 00:30',
       'DhumketuExpress will departure for Chittagong at 02:30',
       'SubornoExpress will departure for Chittagong at 14:30',
       'ABC will departure for Dhaka at 17:30',
       'ShonarBangla will departure for Dhaka at 12:30',
       'SubornoExpress will departure for Rajshahi at 14:30',
       'ABCD will departure for Chittagong at 01:00',
       'SubornoExpress will departure for Dhaka at 11:30',
       'ABC will departure for Barisal at 03:00',
       'PadmaExpress will departure for Chittagong at 20:30',
       'ABC will departure for Khulna at 03:00',
       'ABCE will departure for Sylhet at 23:05 ',
       'PadmaExpress will departure for Dhaka at 19:30']

def time(time):
     h,m = map(int,(time.split(' ')[-1]).split(':'))
     return (h*60)+m


def bubbleSort(arr):
    for i in range(len(arr) - 1):
        boolian = False
        for j in range(len(arr) - i - 1):
            if (arr[j].split(' ')[0] > arr[j + 1].split(' ')[0]):
                arr[j], arr[j + 1] = arr[j + 1], arr[j]
                boolian = True

            elif (arr[j].split(' ')[0] == arr[j + 1].split(' ')[0]) and (time(arr[j]) < time(arr[j+1])):
                arr[j], arr[j + 1] = arr[j + 1], arr[j]
                boolian = True

        if boolian == False:
            break


bubbleSort(arr)
for var in arr:
    print(var)
