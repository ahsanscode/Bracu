with open('input2(3).txt', 'r') as input_file:
    with open('output2(3).txt', 'w') as output_file:
        num_vertices, num_edges = map(int, input_file.readline().split(' '))

        graph_data = {}
        shortest_dist_s1 = {}
        shortest_dist_s2 = {}
        visited_1 = []
        visited_2 = []

        for var in range(1, num_vertices + 1):
            shortest_dist_s1[var] = float('inf')
            shortest_dist_s2[var] = float('inf')

        for var in range(num_edges):
            s, d, w = map(int, input_file.readline().split(' '))
            if s in graph_data:
                graph_data[s].append((d, w))
            else:
                graph_data[s] = [(d, w)]

        source_1, source_2 = map(int, input_file.readline().strip('\n').split(' '))
        shortest_dist_s1[source_1] = 0
        shortest_dist_s2[source_2] = 0


        def dijkstra(graph, starting_node, shortest_distance, visited):
            if starting_node in graph_data and starting_node not in visited:
                visited.append(starting_node)
                starting_node_distance = shortest_distance[starting_node]
                neighbours = graph_data[starting_node]
                min_neighbour_dist = float('inf')
                min_neighbour = None

                for var in neighbours:
                    neighbour = var[0]
                    neighbour_distance = var[1]
                    distance_from_starting = starting_node_distance + neighbour_distance
                    if distance_from_starting < shortest_distance[neighbour]:
                        shortest_distance[neighbour] = distance_from_starting

                    if neighbour not in visited and neighbour_distance < min_neighbour_dist:
                        min_neighbour_dist = neighbour_distance
                        min_neighbour = neighbour

                dijkstra(graph, min_neighbour, shortest_distance, visited)
            else:
                return


        dijkstra(graph_data, source_1, shortest_dist_s1, visited_1)
        for var in range(1, num_vertices + 1):
            if var not in visited_1:
                dijkstra(graph_data, var, shortest_dist_s1, visited_1)

        dijkstra(graph_data, source_2, shortest_dist_s2, visited_2)
        for var in range(1, num_vertices + 1):
            if var not in visited_2:
                dijkstra(graph_data, var, shortest_dist_s2, visited_2)

        best_location = None
        time_diff = float('inf')
        min_time = None

        for var in range(1, num_vertices + 1):
            if abs(shortest_dist_s1[var] - shortest_dist_s2[var]) < time_diff:
                time_diff = abs(shortest_dist_s1[var] - shortest_dist_s2[var])
                best_location = var
                if shortest_dist_s1[var] > shortest_dist_s2[var]:
                    min_time = shortest_dist_s1[var]
                else:
                    min_time = shortest_dist_s2[var]

        if min_time is None:
            output_file.write('Impossible')
        else:
            output_file.write('Time' + str(min_time)+'\n')
            output_file.write('Node' + str(best_location))
