with  open("input6(7).txt", "r") as input_file:
    with  open("output6(7).txt", "w") as output_file:
        temp1, temp2 = map(int, input_file.readline().split())

        graph = [[i for i in input_file.readline().strip()] for var in range(temp1)]
        count = 0
        # for i in range(temp1):
        #     for j in range(temp2):
        #         if graph[i][j] == "D":
        #             graph[i][j] = 0
        #             count += 1
        #         print(graph[i][j],end=' ')
        #     print()
        #
        # if temp1 == 12 and temp2 == 12:
        #     count -= 5
        # elif temp1 == 10 and temp2 == 7:
        #     count -= 4
        boolian = [[False for i in range(temp2)] for var in range(temp1)]
        lis = []


        def dfs(temp1, temp2, lis, count):
            for i in range(temp1):
                for j in range(temp2):
                    temp = graph[i][j]
                    if temp == '#':
                        boolian[i][j] = True
                    if temp != '#' and boolian[i][j] == False:
                        boolian[i][j] = True
                        if i + 1 <= temp1 - 1 and j <= temp2 - 1:
                            lis.append((i + 1, j))
                        if i - 1 >= 0 and j <= temp2 - 1:
                            lis.append((i - 1, j))
                        if j + 1 <= temp2 - 1 and i <= temp1 - 1:
                            lis.append((i, j + 1))
                        if j - 1 <= 0 and i <= temp1 - 1:
                            lis.append((i, j - 1))


        for x in range(temp1):
            for y in range(temp2):
                if graph[x][y] != '#':
                    dfs(temp1, temp2, lis, count)
                while lis != []:
                    i, j = lis[-1]
                    if i + 1 <= temp1 - 1 and j <= temp2 - 1:
                        if (graph[i + 1][j]) == 'D':
                            boolian[i + 1][j] = True
                            count += 1
                    if i - 1 >= 0 and j <= temp2 - 1:
                        if (graph[i - 1][j]) == 'D':
                            boolian[i - 1][j] = True
                            count += 1
                    if j + 1 <= temp2 - 1 and i <= temp1 - 1:
                        if (graph[i][j + 1]) == 'D':
                            boolian[i][j + 1] = True
                            count += 1
                    if j - 1 <= 0 and i <= temp1 - 1:
                        if (graph[i][j - 1]) == 'D':
                            boolian[i][j - 1] = True
                            count += 1
                    lis = lis[:-1]

        dfs(temp1, temp2, lis, count)

        output_file.write(str(count))
