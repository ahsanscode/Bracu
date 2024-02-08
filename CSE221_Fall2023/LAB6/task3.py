with open('input3(2).txt','r') as input_file:
    with open('output3(2).txt','w') as output_file:
        p, c = map(int, input_file.readline().split(' '))
        individual_people = [{var} for var in range(1, p+1)]

        par_a, par_b = map(int, input_file.readline().split(' '))

        friend_circle = [{par_a} | {par_b}]
        output_file.write(str(len(friend_circle[0]))+'\n')

        for var in range(c-1):
            par_a, par_b = map(int, input_file.readline().split(' '))
            temp_circle = {par_a} | {par_b}
            for i in friend_circle:

                if par_a in i and len(friend_circle) > 1:
                    boolian = False
                    for j in friend_circle:
                        if par_b in j and j != i:
                            new_friends = i | j
                            friend_circle.append(new_friends)
                            friend_circle.remove(i)
                            friend_circle.remove(j)
                            output_file.write(str(len(new_friends))+'\n')
                            boolian = True
                            break
                    if boolian:
                        break

                elif par_b in i and len(friend_circle) > 1:
                    boolian = False
                    for j in friend_circle:
                        if par_a in j and j != i:
                            new_friends = i | j
                            friend_circle.remove(i)
                            friend_circle.remove(j)
                            friend_circle.append(new_friends)
                            output_file.write(str(len(new_friends))+'\n')
                            boolian = True
                            break
                    if boolian:
                        break

                if i.intersection(temp_circle) != set():
                    new_circle = i | temp_circle
                    output_file.write(str(len(new_circle))+'\n')
                    friend_circle.append(new_circle)
                    friend_circle.remove(i)
                    temp = False
                    break
                else:
                    temp = True
                if temp:
                    friend_circle.append(temp_circle)
